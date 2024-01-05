<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Tools\Tools;
use App\Models\Category;
use App\Models\Image;
use App\Models\Intro;
use App\Models\Menu;
use App\Models\MenuLink;
use App\Models\Showcase;
use App\Models\User;
use App\Models\UserEditableContent;
use Buglinjo\LaravelWebp\Webp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use WebPConvert\WebPConvert;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $type = $request->get('type');

        if (!empty($keyword)) {
            if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
                $categories = Category::whereHas('editors', function($q) {
                    $q->where('user_id', '=', Auth::user()->id);
                })->where('title', 'LIKE', "%$keyword%");
            }
            else {
                $categories = Category::where('title', 'LIKE', "%$keyword%");
            }
            $categories->orWhere('subtitle', 'LIKE', "%$keyword%")
            ->orWhere('svg', 'LIKE', "%$keyword%")
            ->orWhere('content', 'LIKE', "%$keyword%")
            ->orWhere('enabled', 'LIKE', "%$keyword%")
            ->orWhere('category_id', 'LIKE', "%$keyword%")
            ->latest()->paginate($perPage);

        } else {
            if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
                $categories = Category::where('type', '=', $type)->whereHas('editors', function($q) {
                    $q->where('user_id', '=', Auth::user()->id);
                })->latest()->get();//->paginate($perPage);
            }
            else {
                $categories = Category::where('type', '=', $type)->latest()->get();//->paginate($perPage);
            }
        }

        return view('admin.categories.index', compact('categories', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $categories = Auth::user()->ownedDefinitions();
            $tops = Category::where('group_agencies', '=', true)->get();
            foreach ($tops as $tp) {
                $categories[] = $tp;
            }
        }
        else {
            $categories = Category::all();
        }

        $menus = Menu::all();
        $users = User::role('agency')->get();
        $type = $request->get('type');

        return view('admin.categories.create', compact('categories', 'menus', 'type', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required|max:20',
			'enabled' => 'required',
			// 'friendly' => 'required'
		]);
        $requestData = $request->all();

        $category = Category::create($requestData);

        $this->syncEditorsWithMe($category);

        if (isset($requestData['menu_id'])) {
            (new MenuLink())->setLink($requestData['menu_id'], Category::class, $category->id, route('front.category', ['friendly' => $category->friendly]));
        }

        if ($request->hasFile('preview')) {
            (new Image())->storeImage($request->file('preview'), Category::class, $category->id);
        }

        return redirect('admin/categories/' . $category->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$category->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$category->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $categories = Auth::user()->ownedDefinitions();
            $tops = Category::where('group_agencies', '=', true)->get();
            foreach ($tops as $tp) {
                $categories[] = $tp;
            }
        }
        else {
            $categories = Category::all();
        }

        $menus = Menu::all();
        $users = User::role('agency')->get();

        return view('admin.categories.edit', compact('category', 'categories', 'menus', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'title' => 'required|max:20',
			'enabled' => 'required',
			// 'friendly' => 'required'
		]);

        $requestData = $request->all();

        $category = Category::findOrFail($id);

        if (isset($requestData['menu_id'])) {
            if ($category->menu) {
                $category->menu->setLink($requestData['menu_id'], Category::class, $category->id, route('front.category', ['friendly' => $category->friendly]));
            }
            else {
                (new MenuLink())->setLink($requestData['menu_id'], Category::class, $category->id, route('front.category', ['friendly' => $category->friendly]));
            }
        }
        else {
            if ($category->menu)
                $category->menu->delete();
        }

        $category->update($requestData);

        $this->sync($category, $requestData);

        if ($request->hasFile('preview')) {
            if ($category->image) {
                $category->image->deleteImage(true);
            }
            (new Image())->storeImage($request->file('preview'), Category::class, $category->id);
        }

        return redirect('admin/categories/' . $category->id)->with('success', 'Se ha actualizado el elemento exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$category->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        if ($category->image)
            $category->image->deleteImage(true);

        if ($category->intro)
            $category->intro->deleteIntro();

        if ($category->showcase) {
            $category->showcase->deleteShowcase();
        }

        if ($category->editors)
            $category->editors()->delete();

        Category::destroy($id);

        if (Auth::user()->hasRole('super-admin|admin')) {
            return redirect('admin/categories?type=' . $category->type)->with('success', 'Se ha eliminado el elemento exitosamente!');
        }
        else {
            return redirect(route('admin.dashboard'))->with('success', 'Se ha eliminado el elemento exitosamente!');
        }

    }

    public function sync($category, $requestData) {
        if (isset($requestData['editors_id'])) {

            $category->editors()->delete();

            foreach ($requestData['editors_id'] as $user_id) {
                $content = new UserEditableContent();
                $content->user_id = $user_id;
                $content->editable_id = $category->id;
                $content->editable_type = 'App\\Models\\Category';
                $content->save();
            }
        }
    }

    public function syncEditorsWithMe($category) {
        //if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $category->editors()->delete();

            $content = new UserEditableContent();
            $content->user_id = Auth::user()->id;
            $content->editable_id = $category->id;
            $content->editable_type = 'App\\Models\\Category';
            $content->save();
        //}
    }
}
