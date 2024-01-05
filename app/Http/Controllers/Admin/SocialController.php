<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Image;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
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
            $socials = Social::where('title', 'LIKE', "%$keyword%")
                ->orWhere('icon', 'LIKE', "%$keyword%")
                ->orWhere('url', 'LIKE', "%$keyword%")
                ->orWhere('enabled', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $socials = Social::latest()->paginate($perPage);
        }

        return view('admin.social.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.social.create');
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
			'url' => 'required'
		]);
        $requestData = $request->all();

        $social = Social::create($requestData);

        if ($request->hasFile('image')) {
            (new Image())->storeImage($request->file('image'), Social::class, $social->id, null, false);
        }

        return redirect('admin/social/' . $social->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $social = Social::findOrFail($id);

        return view('admin.social.show', compact('social'));
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
        $social = Social::findOrFail($id);

        return view('admin.social.edit', compact('social'));
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
			'url' => 'required'
		]);
        $requestData = $request->all();

        $social = Social::findOrFail($id);
        $social->update($requestData);

        if ($request->hasFile('image')) {
            if ($social->image) {
                $social->image->deleteImage(true);
            }
            (new Image())->storeImage($request->file('image'), Social::class, $social->id, null, false);
        }

        return redirect('admin/social/' . $social->id)->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        $social = Social::findOrFail($id);

        if ($social->image)
            $social->image->deleteImage(true);

        Social::destroy($id);

        return redirect('admin/social')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }
}
