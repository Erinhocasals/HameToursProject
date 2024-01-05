<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Tools\Tools;
use App\Models\Image;
use App\Models\Intro;
use Illuminate\Http\Request;

class IntrosController extends Controller
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
            $intros = Intro::where('title', 'LIKE', "%$keyword%")
                ->orWhere('subtitle', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('big_image', 'LIKE', "%$keyword%")
                ->orWhere('small_image', 'LIKE', "%$keyword%")
                ->orWhere('enabled', 'LIKE', "%$keyword%")
                ->orWhere('introable_id', 'LIKE', "%$keyword%")
                ->orWhere('introable_type', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $intros = Intro::latest()->paginate($perPage);
        }

        return view('admin.intros.index', compact('intros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($model, $id)
    {
        $allowed = ['Category', 'Info', 'Blog']; // list all models here

        if(!in_array($model, $allowed)) {
            return redirect(url()->previous())->with('error', 'Operación no permitida');
        }

        return view('admin.intros.create', [
            'introable_id' => $id,
            'introable_type' => 'App\\Models\\' . $model
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

        if ($request->hasFile('big_image')) {
            $requestData['big_image'] = Image::storeExternalImage($request->file('big_image'), true); //$request->file('big_image')->store('uploads', 'public');
        }
        if ($request->hasFile('small_image')) {
            $requestData['small_image'] = Image::storeExternalImage($request->file('small_image'), true); //$request->file('small_image')->store('uploads', 'public');
        }

        $intro = Intro::create($requestData);

        return redirect($intro->introable->backendLink())->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $intro = Intro::findOrFail($id);

        return view('admin.intros.show', compact('intro'));
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
        $intro = Intro::findOrFail($id);

        if ($intro->introable == null) {
            $intro->delete();
            return redirect(route('admin.intros.index'))->with('success', 'El elemento no esta vinculado a ningún elemento!');
        }

        return view('admin.intros.edit', [
            'intro' => $intro,
            'introable_id' => $intro->introable_id,
            'introable_type' => $intro->introable_type
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

        $intro = Intro::findOrFail($id);

        $requestData = $request->all();

        if ($request->hasFile('big_image')) {
            if ($intro->big_image) {
                Tools::tryToDeleteFile($intro->big_image);
            }

            $requestData['big_image'] = Image::storeExternalImage($request->file('big_image')); //->store('uploads', 'public');
        }

        if ($request->hasFile('small_image')) {
            if ($intro->small_image) {
                Tools::tryToDeleteFile($intro->small_image);
            }

            $requestData['small_image'] = Image::storeExternalImage($request->file('small_image')); //$request->file('small_image')->store('uploads', 'public');
        }

        $intro->update($requestData);

        return redirect($intro->introable->backendLink());
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
        $intro = Intro::findOrFail($id);

        if ($intro->big_image)
            Tools::tryToDeleteFile($intro->big_image);

        if ($intro->small_image)
            Tools::tryToDeleteFile($intro->small_image);


        Intro::destroy($id);

        return redirect('admin/intros')->with('success', 'Se ha eliminado el elemento!');
    }

    /*
    * Deletes a big or small image by parameter
    */
    public function deleteImage($id, $type) {
        $intro = Intro::findOrFail($id);

        Tools::tryToDeleteFile($intro->$type);
        $intro->$type = null;

        $intro->update();

        return redirect('admin/intros/' . $intro->id)->with('success', 'Se ha eliminado el elemento!');
    }
}
