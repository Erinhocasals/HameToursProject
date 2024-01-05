<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Tools\Tools;
use App\Models\Category;
use App\Models\FilterCategory;
use App\Models\UserEditableContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilterCategoriesController extends Controller
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
                $filtercategories = FilterCategory::whereHas('editors', function($q) {
                    $q->where('user_id', '=', Auth::user()->id);
                })->where('title', 'LIKE', "%$keyword%");
            }
            else {
                $filtercategories = FilterCategory::where('title', 'LIKE', "%$keyword%");
            }
            $filtercategories->orWhere('subtitle', 'LIKE', "%$keyword%")
            ->orWhere('subtitle', 'LIKE', "%$keyword%")
            ->orWhere('enabled', 'LIKE', "%$keyword%")
            ->latest()->paginate($perPage);

        } else {
            if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
                $filtercategories = FilterCategory::whereHas('editors', function($q) {
                    $q->where('user_id', '=', Auth::user()->id);
                })->latest()->paginate($perPage);
            }
            else {
                $filtercategories = FilterCategory::latest()->paginate($perPage);
            }
        }

        return view('admin.filter-categories.index', compact('filtercategories'));
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

        return view('admin.filter-categories.create', compact('categories'));
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

        $filtercategory = FilterCategory::create($requestData);
        $filtercategory->categories()->sync($requestData['categories_id']);
        $this->syncEditorsWithMe($filtercategory);

        return redirect('admin/filter-categories/' . $filtercategory->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $filtercategory = FilterCategory::findOrFail($id);

        return view('admin.filter-categories.show', compact('filtercategory'));
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
        $filtercategory = FilterCategory::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$filtercategory->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $categories = Auth::user()->ownedDefinitions();
        }
        else {
            $categories = Category::all();
        }

        return view('admin.filter-categories.edit', compact('filtercategory', 'categories'));
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

        $filtercategory = FilterCategory::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$filtercategory->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);


        $requestData = $request->all();

        $filtercategory = FilterCategory::findOrFail($id);
        $filtercategory->update($requestData);

        $filtercategory->categories()->sync($requestData['categories_id']);
        $this->syncEditorsWithMe($filtercategory);

        return redirect('admin/filter-categories/' . $filtercategory->id)->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        $filtercategory = FilterCategory::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$filtercategory->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        if ($filtercategory->editors)
            $filtercategory->editors()->delete();

        FilterCategory::destroy($id);

        return redirect('admin/filter-categories')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }

    public function syncEditorsWithMe($filtercategory) {
        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $filtercategory->editors()->delete();

            $content = new UserEditableContent();
            $content->user_id = Auth::user()->id;
            $content->editable_id = $filtercategory->id;
            $content->editable_type = 'App\\Models\\FilterCategory';
            $content->save();
        }
    }
}
