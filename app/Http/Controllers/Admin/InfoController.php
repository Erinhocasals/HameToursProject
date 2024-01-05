<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Image;
use App\Models\Info;
use App\Models\Menu;
use App\Models\MenuLink;
use Illuminate\Http\Request;

class InfoController extends Controller
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
            $info = Info::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('enabled', 'LIKE', "%$keyword%")
                ->orWhere('friendly', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $info = Info::latest()->paginate($perPage);
        }

        return view('admin.info.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.info.create', compact('menus'));
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
			// 'image' => 'required',
			// 'friendly' => 'required'
		]);

        $requestData = $request->all();
        $info = Info::create($requestData);

        if ($requestData['menu_id']) {
            (new MenuLink())->setLink($requestData['menu_id'], Info::class, $info->id, route('front.info', ['friendly' => $info->friendly]));
        }

        if ($request->hasFile('image')) {
            (new Image())->storeImage($request->file('image'), Info::class, $info->id);
        }

        return redirect('admin/infos/' . $info->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $info = Info::findOrFail($id);

        return view('admin.info.show', compact('info'));
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
        $info = Info::findOrFail($id);
        $menus = Menu::all();

        return view('admin.info.edit', compact('info', 'menus'));
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
			// 'image' => 'required',
			// 'friendly' => 'required'
		]);

        $requestData = $request->all();
        $info = Info::findOrFail($id);

        if ($requestData['menu_id']) {
            if ($info->menu) {
                $info->menu->setLink($requestData['menu_id'], Info::class, $info->id, route('front.info', ['friendly' => $info->friendly]));
            }
            else {
                (new MenuLink())->setLink($requestData['menu_id'], Info::class, $info->id, route('front.info', ['friendly' => $info->friendly]));
            }
        }

        $info->update($requestData);

        if ($request->hasFile('image')) {
            if ($info->image && isset($info->image->url)) {
                $info->image->deleteImage(true);
            }
            (new Image())->storeImage($request->file('image'), Info::class, $info->id);
        }

        return redirect('admin/infos/' . $info->id)->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        $info = Info::findOrFail($id);

        if ($info->image)
            $info->image->deleteImage(true);

        if ($info->intro)
            $info->intro->deleteIntro();

        Info::destroy($id);

        return redirect('admin/infos')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }
}
