<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Tools\Tools;
use App\Models\Image;
use App\Models\Showcase;
use Illuminate\Http\Request;

class ShowcasesController extends Controller
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
            $showcases = Showcase::where('title', 'LIKE', "%$keyword%")
                ->orWhere('subtitle', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('svg', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('enabled', 'LIKE', "%$keyword%")
                ->orWhere('showcaseable_id', 'LIKE', "%$keyword%")
                ->orWhere('showcaseable_type', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $showcases = Showcase::latest()->paginate($perPage);
        }

        return view('admin.showcases.index', compact('showcases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($model, $id)
    {
        $allowed = ['Category', 'Entity', 'Package'];

        if(!in_array($model, $allowed)) {
            return redirect(url()->previous())->with('error', 'Operación no permitida');
        }

        return view('admin.showcases.create', [
            'showcaseable_id' => $id,
            'showcaseable_type' => 'App\\Models\\' . $model
        ]);
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
			'enabled' => 'required'
		]);

        $requestData = $request->all();

        if ($request->hasFile('svg')) {
            $requestData['svg'] = $request->file('svg')->store('uploads', 'public');
        }

        $showcase = Showcase::create($requestData);

        if ($request->hasFile('image')) {
            (new Image())->storeImage($request->file('image'), Showcase::class, $showcase->id);
        }

        return redirect($showcase->showcaseable->backendLink())->with('success', 'Se ha creado el elemento exitosamente!');
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
        $showcase = Showcase::findOrFail($id);

        return view('admin.showcases.show', compact('showcase'));
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
        $showcase = Showcase::findOrFail($id);

        return view('admin.showcases.edit', [
            'showcase' => $showcase,
            'showcaseable_id' => $showcase->showcaseable_id,
            'showcaseable_type' => $showcase->showcaseable_type
        ]);
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
			'enabled' => 'required'
		]);

        $showcase = Showcase::findOrFail($id);
        $requestData = $request->all();

        if ($request->hasFile('svg')) {
            if ($showcase->svg)
                Tools::tryToDeleteFile($showcase->svg);

            $requestData['svg'] = $request->file('svg')->store('uploads', 'public');
        }

        if ($request->hasFile('image')) {
            (new Image())->storeImage($request->file('image'), Showcase::class, $showcase->id);
        }

        $showcase->update($requestData);

        return redirect($showcase->showcaseable->backendLink())->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        $showcase = Showcase::findOrFail($id);
        if ($showcase->svg)
            Tools::tryToDeleteFile($showcase->svg);

        foreach($showcase->images as $image) {
            $image->deleteImage(true);
        }

        Showcase::destroy($id);

        return redirect($showcase->showcaseable->backendLink())->with('success', 'Se ha eliminado el elemento!');
    }
}
