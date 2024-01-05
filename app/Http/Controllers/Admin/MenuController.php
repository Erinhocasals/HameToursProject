<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
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
            $menu = Menu::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('enabled', 'LIKE', "%$keyword%")
                ->orWhere('menuable_id', 'LIKE', "%$keyword%")
                ->orWhere('menuable_type', 'LIKE', "%$keyword%")
                ->orWhere('menu_id', 'LIKE', "%$keyword%")
                ->orWhere('style', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $menu = Menu::latest()->paginate($perPage);
        }

        $already_ordered = Menu::where('order', '!=', null);
        if ($already_ordered) {
            $already_ordered = Menu::orderBy('id')->get();
            $i = 0;
            foreach ($already_ordered as $m) {
                $m->order = $i++;
                $m->save();
            }
        }

        return view('admin.menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.menu.create', compact('menus'));
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

        if(!isset($requestData['style']) || $requestData['style'] == null)
            $requestData['style'] = "2";

        $menu = Menu::create($requestData);

        return redirect('admin/menus/' . $menu->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $menu = Menu::findOrFail($id);

        return view('admin.menu.show', compact('menu'));
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
        $menu = Menu::findOrFail($id);
        $menus = Menu::all();

        return view('admin.menu.edit', compact('menu', 'menus'));
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

        $menu = Menu::findOrFail($id);
        $menu->update($requestData);

        if ($menu->style == 1) {
            $others = Menu::where('id', '!=', $menu->id)->get();

            foreach ($others as $other) {
                $other->style = 2;
                $other->update();
            }
        }

        return redirect('admin/menus/' . $menu->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        Menu::destroy($id);

        return redirect('admin/menus')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }

    public function sort(Request $request) {
        $data = $request->get('data');

        if ($data) {
            $data = json_decode($data);

            for ($i = 0; $i < count($data); $i++) {
                $menu = Menu::findOrFail($data[$i]);
                $menu->order = $i;
                $menu->save();
            }

            return true;
        }

        return false;
    }
}
