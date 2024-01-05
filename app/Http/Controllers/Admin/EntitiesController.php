<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Entity;
use App\Models\EntityCategory;
use App\Models\Filter;
use App\Models\FilterCategory;
use App\Models\Image;
use App\Models\UserEditableContent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class EntitiesController extends Controller
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
                $entities = Entity::whereHas('editors', function($q) {
                    $q->where('user_id', '=', Auth::user()->id);
                })->where('title', 'LIKE', "%$keyword%");
            }
            else {
                $entities = Entity::where('title', 'LIKE', "%$keyword%");
            }
            $entities->orWhere('subtitle', 'LIKE', "%$keyword%")
            ->orWhere('svg', 'LIKE', "%$keyword%")
            ->orWhere('content', 'LIKE', "%$keyword%")
            ->orWhere('enabled', 'LIKE', "%$keyword%")
            ->orWhere('category_id', 'LIKE', "%$keyword%")
            ->latest()->get;//->paginate($perPage);

        } else {
            if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
                $entities = Entity::whereHas('editors', function($q) {
                    $q->where('user_id', '=', Auth::user()->id);
                })->latest()->get;//->paginate($perPage);
            }
            else {
                $entities = Entity::latest()->get();//paginate($perPage);
            }
        }

        return view('admin.entities.index', compact('entities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $categories = auth()->user()->ownedEntityCategories();
            $definitions = auth()->user()->ownedDefinitions();
        }
        else {
            $categories = EntityCategory::all();
            $definitions = Category::all();
        }

        $filters = FilterCategory::all();

        return view('admin.entities.create', compact('categories', 'definitions', 'filters'));
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

        if ($requestData['date_start']) {
            $requestData['date_start'] = Carbon::createFromFormat('d M, Y', $requestData['date_start'])->format('Y-m-d');
        }
        if ($requestData['date_end']) {
            $requestData['date_end'] = Carbon::createFromFormat('d M, Y', $requestData['date_end'])->format('Y-m-d');
        }

        $entity = Entity::create($requestData);

        if (isset($requestData['definitions_id']))
            $entity->definitions()->sync($requestData['definitions_id']);

        if (isset($requestData['filters_id']))
            $entity->filters()->sync($requestData['filters_id']);

        $this->syncEditorsWithMe($entity);

        if ($request->hasFile('image')) {
            (new Image())->storeImage($request->file('image'), Entity::class, $entity->id);
        }

        return redirect('admin/entities/' . $entity->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $entity = Entity::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$entity->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        $links = session()->has('links') ? session('links') : [];
        $currentLink = request()->path();
        array_unshift($links, $currentLink);
        session(['links' => $links]);

        return view('admin.entities.show', compact('entity'));
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
        $entity = Entity::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$entity->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $categories = auth()->user()->ownedEntityCategories();
            $definitions = auth()->user()->ownedDefinitions();
        }
        else {
            $categories = EntityCategory::all();
            $definitions = Category::all();
        }

        $filters = FilterCategory::all();

        return view('admin.entities.edit', compact('entity', 'categories', 'definitions', 'filters'));
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

        $entity = Entity::findOrFail($id);

        $requestData = $request->all();

        if ($requestData['date_start']) {
            $requestData['date_start'] = Carbon::createFromFormat('d M, Y', $requestData['date_start'])->format('Y-m-d');
        }
        if ($requestData['date_end']) {
            $requestData['date_end'] = Carbon::createFromFormat('d M, Y', $requestData['date_end'])->format('Y-m-d');
        }

        $entity->update($requestData);

        if (!isset($requestData['definitions_id']))
            $requestData['definitions_id'] = array();

        if (isset($requestData['definitions_id']))
            $entity->definitions()->sync($requestData['definitions_id']);

        if (isset($requestData['filters_id']))
            $entity->filters()->sync($requestData['filters_id']);

        $this->syncEditorsWithMe($entity);

        if ($request->hasFile('image')) {
            if ($entity->image) {
                $entity->image->deleteImage(true);
            }
            (new Image())->storeImage($request->file('image'), Entity::class, $entity->id);
        }

        return redirect('admin/entities/' . $entity->id)->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        $entity = Entity::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$entity->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        if ($entity->image)
            $entity->image->deleteImage(true);

        if ($entity->showcase) {
            $entity->showcase->deleteShowcase();
        }

        if ($entity->editors)
            $entity->editors()->delete();

        Entity::destroy($id);

        return redirect('admin/entities')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }

    public function syncEditorsWithMe($entity) {
        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $entity->editors()->delete();

            $content = new UserEditableContent();
            $content->user_id = Auth::user()->id;
            $content->editable_id = $entity->id;
            $content->editable_type = 'App\\Models\\Entity';
            $content->save();
        }
    }
}
