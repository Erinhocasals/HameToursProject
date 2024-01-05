<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Entity;
use App\Models\Image;
use App\Models\Package;
use App\Models\UserEditableContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
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
                $package = Package::whereHas('editors', function($q) {
                    $q->where('user_id', '=', Auth::user()->id);
                })->where('title', 'LIKE', "%$keyword%");
            }
            else {
                $package = Package::where('title', 'LIKE', "%$keyword%");
            }
            $package->orWhere('subtitle', 'LIKE', "%$keyword%")
            ->orWhere('subtitle', 'LIKE', "%$keyword%")
            ->orWhere('content', 'LIKE', "%$keyword%")
            ->orWhere('summary', 'LIKE', "%$keyword%")
            ->latest()->paginate($perPage);

        } else {
            if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
                $package = Package::whereHas('editors', function($q) {
                    $q->where('user_id', '=', Auth::user()->id);
                })->latest()->paginate($perPage);
            }
            else {
                $package = Package::latest()->paginate($perPage);
            }
        }

        return view('admin.package.index', compact('package'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $entities = Entity::all();

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $definitions = auth()->user()->ownedDefinitions();
        }
        else {
            $definitions = Category::all();
        }

        return view('admin.package.create', compact('entities', 'definitions'));
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
			//'starred' => 'required',
		]);

        $requestData = $request->all();
        $package = Package::create($requestData);

        if (!isset($requestData['definitions_id']))
            $requestData['definitions_id'] = array();

        $package->definitions()->sync($requestData['definitions_id']);

        $this->syncEditorsWithMe($package);

        if ($request->hasFile('image')) {
            (new Image())->storeImage($request->file('image'), Package::class, $package->id);
        }

        return redirect('admin/package/' . $package->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $package = Package::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$package->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        return view('admin.package.show', compact('package'));
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
        $package = Package::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$package->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        $entities = Entity::all();

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $definitions = auth()->user()->ownedDefinitions();
        }
        else {
            $definitions = Category::all();
        }

        return view('admin.package.edit', compact('package', 'entities', 'definitions'));
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
			//'starred' => 'required',
		]);

        $requestData = $request->all();

        $package = Package::findOrFail($id);
        $package->update($requestData);

        if (!isset($requestData['definitions_id']))
            $requestData['definitions_id'] = array();

        $package->definitions()->sync($requestData['definitions_id']);

        $this->syncEditorsWithMe($package);

        if ($request->hasFile('image')) {
            if ($package->image) {
                $package->image->deleteImage(true);
            }
            (new Image())->storeImage($request->file('image'), Package::class, $package->id);
        }

        return redirect('admin/package/' . $package->id)->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        $package = Package::findOrFail($id);

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin') && !$package->editors->pluck('user_id')->contains(Auth::user()->id))
            abort(403);

        if ($package->image)
            $package->image->deleteImage(true);

        Package::destroy($id);

        return redirect('admin/package')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }

    public function syncEditorsWithMe($package) {
        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $package->editors()->delete();

            $content = new UserEditableContent();
            $content->user_id = Auth::user()->id;
            $content->editable_id = $package->id;
            $content->editable_type = 'App\\Models\\Package';
            $content->save();
        }
    }
}
