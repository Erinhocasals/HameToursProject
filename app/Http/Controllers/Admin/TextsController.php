<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Image;
use App\Models\Text;
use Illuminate\Http\Request;

class TextsController extends Controller
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

        $texts = Text::all();
        foreach($texts as $text) {
            if ($text->textable == null) {
                $text->delete();
            }
        }

        if (!empty($keyword)) {
            $texts = Text::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('enabled', 'LIKE', "%$keyword%")
                ->orWhere('textable_id', 'LIKE', "%$keyword%")
                ->orWhere('textable_type', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $texts = Text::latest()->paginate($perPage);
        }

        return view('admin.texts.index', compact('texts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($model, $id)
    {
        $allowed = ['Entity', 'Info', 'Category', 'Package']; // list all models here

        if(!in_array($model, $allowed)) {
            return redirect(url()->previous())->with('error', 'Operación no permitida');
        }

        return view('admin.texts.create', [
            'textable_id' => $id,
            'textable_type' => 'App\\Models\\' . $model
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

        $text = Text::create($requestData);

        if ($request->hasFile('image')) {
            (new Image())->storeImage($request->file('image'), Text::class, $text->id, null, false);
        }

        return redirect($text->textable->backendLink())->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $text = Text::findOrFail($id);

        return view('admin.texts.show', compact('text'));
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
        $text = Text::findOrFail($id);

        return view('admin.texts.edit', [
            'text' => $text,
            'textable_id' => $text->textable_id,
            'textable_type' => $text->textable_type
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
        $requestData = $request->all();

        $text = Text::findOrFail($id);
        $text->update($requestData);

        if ($request->hasFile('image')) {
            if ($text->image) {
                $text->image->deleteImage(true);
            }
            (new Image())->storeImage($request->file('image'), Text::class, $text->id, null, false);
        }

        return redirect($text->textable->backendLink())->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        $text = Text::findOrFail($id);

        if ($text->image)
            $text->image->deleteImage(true);

        Text::destroy($id);

        return redirect($text->textable->backendLink())->with('success', 'Se ha eliminado el elemento exitosamente!');
    }
}
