<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = Data::where('key', '=', 'global')->first();

        if ($data == null) {
            $data = Data::create(['key' => 'global', 'title' => 'Configuración General', 'value' => 'Configuración General', 'time_mailman_to_deliver' => 1]);
            return redirect('admin/data/{$data->id}/edit/')->with('success', 'Se ha creado la configuración inicial exitosamente!');
        }

        return redirect(route('admin.data.edit', ['data' => $data]));

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $data = Data::where('title', 'LIKE', "%$keyword%")
                ->orWhere('key', 'LIKE', "%$keyword%")
                ->orWhere('value', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $data = Data::latest()->paginate($perPage);
        }

        return view('admin.data.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.data.create');
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
			'key' => 'required|max:256',
			'value' => 'required'
		]);
        $requestData = $request->all();

        $data = Data::create($requestData);

        return redirect('admin/data/' . $data->id)->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $data = Data::findOrFail($id);

        return view('admin.data.show', compact('data'));
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
        $data = Data::findOrFail($id);

        return view('admin.data.edit', compact('data'));
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
        // $this->validate($request, [
		// 	'value' => 'required'
		// ]);
        $requestData = $request->all();

        $data = Data::findOrFail($id);
        $data->update($requestData);

        //return redirect('admin/data/' . $data->id)->with('success', 'Se ha actualizado el elemento exitosamente!');
        return redirect(route('admin.data.edit', ['data' => $data]))->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        Data::destroy($id);

        return redirect('admin/data')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }
}
