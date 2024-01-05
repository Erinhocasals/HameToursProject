<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Entity;
use App\Models\Package;
use App\Models\PackageContent;
use Illuminate\Http\Request;
use App\Models\PackageTime;
use Illuminate\Support\Facades\Auth;

class PackageTimeController extends Controller
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
            $times = PackageTime::latest()->paginate($perPage);
        } else {
            $times = PackageTime::latest()->paginate($perPage);
        }

        return view('admin.package-time.index', compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Package $package)
    {
        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $definitions = auth()->user()->ownedDefinitions();
            $entities = auth()->user()->ownedEntities();
        }
        else {
            $definitions = Category::all();
            $entities = Entity::all();
        }

        return view('admin.package-time.create', compact('package', 'definitions', 'entities'));
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
        $requestData['order'] = 0;

        $time = PackageTime::create($requestData);

        $this->sync($time, $requestData);

        return redirect('admin/package/' . $time->package->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $time = PackageTime::findOrFail($id);

        return view('admin.package-time.show', compact('time'));
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
        $time = PackageTime::findOrFail($id);
        $package = $time->package;

        $definitions = Category::all();
        $entities = Entity::all();

        return view('admin.package-time.edit', compact('time', 'package', 'definitions', 'entities'));
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

        $time = PackageTime::findOrFail($id);
        $time->update($requestData);

        $this->sync($time, $requestData);

        return redirect('admin/package/' . $time->package->id)->with('success', 'Se ha actualizado el elemento exitosamente!');
    }

    public function sync($time, $requestData) {
        if ($requestData['elements_id']) {
            $time->contents()->delete();

            foreach ($requestData['elements_id'] as $elem) {
                $data = explode('-', $elem);

                $content = new PackageContent();
                $content->time_id = $time->id;
                $content->contentable_id = $data[1];

                if ($data[0] == 'def') {
                    $content->contentable_type = 'App\\Models\\Category';
                }
                else {
                    $content->contentable_type = 'App\\Models\\Entity';
                }

                $content->save();
            }
        }
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
        $time = PackageTime::findOrFail($id);

        PackageTime::destroy($id);

        return redirect('admin/package/' . $time->package->id)->with('success', 'Se ha eliminado el elemento exitosamente!');
    }
}
