<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
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
            $images = Image::where('url', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $images = Image::latest()->paginate($perPage);
        }

        return view('admin.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($model, $id)
    {
        return view('admin.images.create', [
            'imageable_id' => $id,
            'imageable_type' => 'App\\Models\\' . $model
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
        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $image = (new Image())->storeImage($request->file('image'), $requestData['imageable_type'], $requestData['imageable_id'], $requestData['tag']);
        }

        return redirect($image->imageable->backendLink())->with('success', 'Se ha creado el elemento exitosamente!');
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
        $image = Image::findOrFail($id);

        return view('admin.images.show', compact('image'));
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
        $image = Image::findOrFail($id);

        return view('admin.images.edit', [
            'image' => $image,
            'imageable_id' => $image->imageable_id,
            'imageable_type' => $image->imageable_type
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
        $image = Image::findOrFail($id);
        $requestData = $request->all();

        if ($request->hasFile('image')) {
            if ($image->url)
                $image->deleteImage();

            $image->storeImage($request->file('image'), $image->imageable_type, $image->imageable_id);
        }

        $image->update($requestData);

        return redirect($image->imageable->backendLink())->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        $image = Image::findOrFail($id);

        Image::destroy($id);

        return redirect($image->imageable->backendLink())->with('success', 'Se ha eliminado el elemento exitosamente!');
    }
}
