<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Filter;
use App\Models\FilterCategory;
use App\Models\UserEditableContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FiltersController extends Controller
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
                $filters = Filter::whereHas('editors', function($q) {
                    $q->where('user_id', '=', Auth::user()->id);
                })->where('title', 'LIKE', "%$keyword%");
            }
            else {
                $filters = Filter::where('title', 'LIKE', "%$keyword%");
            }
            $filters->orWhere('friendly', 'LIKE', "%$keyword%")
            ->orWhere('category_id', 'LIKE', "%$keyword%")
            ->latest()->paginate($perPage);

        } else {
            if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
                $filters = Filter::whereHas('editors', function($q) {
                    $q->where('user_id', '=', Auth::user()->id);
                })->latest()->paginate($perPage);
            }
            else {
                $filters = Filter::latest()->paginate($perPage);
            }
        }

        return view('admin.filters.index', compact('filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $categories = Auth::user()->ownedFilterCategories();
        }
        else {
            $categories = FilterCategory::all();
        }

        return view('admin.filters.create', compact('categories'));
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
			// 'title' => 'required|max:256',
			'enabled' => 'required',
			'category_id' => 'required'
		]);

        $requestData = $request->all();
        $filter = Filter::create($requestData);

        $this->syncEditorsWithMe($filter);

        return redirect('admin/filters/' . $filter->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $filter = Filter::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$filter->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        return view('admin.filters.show', compact('filter'));
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
        $filter = Filter::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$filter->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $categories = Auth::user()->ownedFilterCategories();
        }
        else {
            $categories = FilterCategory::all();
        }

        return view('admin.filters.edit', compact('filter', 'categories'));
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
			// 'title' => 'required|max:256',
			'enabled' => 'required',
			'category_id' => 'required'
		]);

        $filter = Filter::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$filter->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        $requestData = $request->all();
        $filter->update($requestData);

        $this->syncEditorsWithMe($filter);

        return redirect('admin/filters/' . $filter->id)->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        $filter = Filter::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$filter->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);


        if ($filter->editors)
            $filter->editors()->delete();

        Filter::destroy($id);

        return redirect('admin/filters')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }

    public function syncEditorsWithMe($filter) {
        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $filter->editors()->delete();

            $content = new UserEditableContent();
            $content->user_id = Auth::user()->id;
            $content->editable_id = $filter->id;
            $content->editable_type = 'App\\Models\\Filter';
            $content->save();
        }
    }
}
