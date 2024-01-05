<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Tools\Tools;
use App\Models\Category;
use App\Models\EntityCategory;
use App\Models\UserEditableContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntityCategoriesController extends Controller
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

        if (!empty($keyword)) {
            if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
                $entitycategories = EntityCategory::whereHas('editors', function($q) {
                    $q->where('user_id', '=', Auth::user()->id);
                })->where('title', 'LIKE', "%$keyword%");
            }
            else {
                $entitycategories = EntityCategory::where('title', 'LIKE', "%$keyword%");
            }
            $entitycategories->orWhere('subtitle', 'LIKE', "%$keyword%")
            ->orWhere('svg', 'LIKE', "%$keyword%")
            ->orWhere('content', 'LIKE', "%$keyword%")
            ->orWhere('enabled', 'LIKE', "%$keyword%")
            ->orWhere('category_id', 'LIKE', "%$keyword%")
            ->latest()->paginate($perPage);
        } else {
            if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
                $entitycategories = EntityCategory::whereHas('editors', function($q) {
                    $q->where('user_id', '=', Auth::user()->id);
                })->latest()->paginate($perPage);
            }
            else {
                $entitycategories = EntityCategory::latest()->paginate($perPage);
            }
        }

        return view('admin.entity-categories.index', compact('entitycategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $categories = Auth::user()->ownedDefinitions();
        }
        else {
            $categories = Category::all();
        }

        return view('admin.entity-categories.create', compact('categories'));
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
			'title' => 'required|max:256',
			'enabled' => 'required',
		]);
        $requestData = $request->all();

        if ($request->hasFile('svg')) {
            $requestData['svg'] = $request->file('svg')->store('uploads', 'public');
        }

        $entitycategory = EntityCategory::create($requestData);
        $entitycategory->categories()->sync($requestData['categories_id']);

        $this->syncEditorsWithMe($entitycategory);

        return redirect('admin/entity-categories')->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $entitycategory = EntityCategory::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$entitycategory->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        return view('admin.entity-categories.show', compact('entitycategory'));
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
        $entitycategory = EntityCategory::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$entitycategory->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $categories = Auth::user()->ownedDefinitions();
        }
        else {
            $categories = Category::all();
        }

        return view('admin.entity-categories.edit', compact('entitycategory', 'categories'));
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
			'title' => 'required|max:256',
			'enabled' => 'required',
		]);

        $entitycategory = EntityCategory::findOrFail($id);
        $requestData = $request->all();

        if ($request->hasFile('svg')) {
            if ($entitycategory->svg)
                Tools::tryToDeleteFile($entitycategory->svg);

            $requestData['svg'] = $request->file('svg')->store('uploads', 'public');
        }

        $entitycategory = EntityCategory::findOrFail($id);
        $entitycategory->update($requestData);

        $entitycategory->categories()->sync($requestData['categories_id']);

        return redirect('admin/entity-categories')->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        $entitycategory = EntityCategory::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$entitycategory->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        Tools::tryToDeleteFile($entitycategory->svg);

        // foreach ($entityCategory->categories as $category) {
        //     $entityCategory->categories()->detach($category);
        // }

        if ($entitycategory->editors)
            $entitycategory->editors()->delete();

        EntityCategory::destroy($id);

        return redirect('admin/entity-categories')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }

    public function syncEditorsWithMe($category) {
        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $category->editors()->delete();

            $content = new UserEditableContent();
            $content->user_id = Auth::user()->id;
            $content->editable_id = $category->id;
            $content->editable_type = 'App\\Models\\EntityCategory';
            $content->save();
        }
    }
}
