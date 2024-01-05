<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Entity;
use App\Models\EntityPackage;
use App\Models\Package;
use Illuminate\Http\Request;

class EntityPackageController extends Controller
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
            $entitypackages = EntityPackage::paginate($perPage);
        } else {
            $entitypackages = EntityPackage::paginate($perPage);
        }

        return view('admin.entity-package.index', compact('entitypackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Package $package)
    {
        $entities = Entity::all();
        return view('admin.entity-package.create', compact('package', 'entities'));
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
        $requestData = $request->all();

        $entitypackage = EntityPackage::where('entity_id', '=', $requestData['entity_id'])
                                        ->where('package_id', '=', $requestData['package_id'])->first();

        if ($entitypackage) {
            $entitypackage->update($requestData);
        }
        else {
            $entitypackage = EntityPackage::create($requestData);
        }

        return redirect('admin/package/' . $entitypackage->package->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $entitypackage = EntityPackage::findOrFail($id);

        return view('admin.entity.packages.show', compact('entitypackage'));
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
        $entitypackage = EntityPackage::findOrFail($id);

        $package = $entitypackage->package;
        $entities = Entity::all();

        return view('admin.entity-package.edit', compact('entitypackage', 'package', 'entities'));
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
        $requestData = $request->all();

        $entitypackage = EntityPackage::findOrFail($id);
        $entitypackage->update($requestData);

        $entitypackage->entity_id = $requestData['entity_id'];
        $entitypackage->save();

        return redirect('admin/package/' . $entitypackage->package->id)->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        $entitypackage = EntityPackage::findOrFail($id);
        EntityPackage::destroy($id);

        return redirect('admin/package/' . $entitypackage->package_id)->with('success', 'Se ha eliminado el elemento exitosamente!');
    }
}
