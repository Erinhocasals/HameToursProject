<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Entity;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Khsing\World\World;

class PricesController extends Controller
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
            $prices = Price::where('top_line', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('bottom_line', 'LIKE', "%$keyword%")
                ->orWhere('enabled', 'LIKE', "%$keyword%")
                ->orWhere('entity_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $prices = Price::latest()->paginate($perPage);
        }

        // foreach($prices as $p) {
        //     if ($p->priceableable == null) {
        //         $p->delete();
        //     }
        // }

        return view('admin.prices.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($model, $id)
    {
        $allowed = ['Entity', 'Package'];

        if(!in_array($model, $allowed)) {
            return redirect(url()->previous())->with('error', 'Operación no permitida');
        }

        $continents = World::Continents();
        $countries = World::Countries();

        return view('admin.prices.create', [
            'priceable_id' => $id,
            'priceable_type' => 'App\\Models\\' . $model,
            'continents' => $continents,
            'countries' => $countries
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
			'price' => 'required',
			'enabled' => 'required',
			//'entity' => 'required'
		]);

        $requestData = $request->all();

        if ($requestData['date_start']) {
            $requestData['date_start'] = Carbon::createFromFormat('d M, Y', $requestData['date_start'])->format('Y-m-d');
        }
        if ($requestData['date_end']) {
            $requestData['date_end'] = Carbon::createFromFormat('d M, Y', $requestData['date_end'])->format('Y-m-d');
        }

        $price = Price::create($requestData);

        return redirect($price->priceable->backendLink())->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $price = Price::findOrFail($id);

        if ($price->priceable == null) {
            $price->delete();
            return redirect('admin/prices')->with('error', 'No se encontró una entidad asociada a este elemento!');
        }


        return view('admin.prices.show', compact('price'));
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
        $price = Price::findOrFail($id);

        $continents = World::Continents();
        $countries = World::Countries();

        $priceable_id = $price->priceable_id;
        $priceable_type = $price->priceable_type;

        return view('admin.prices.edit', compact('price', 'continents', 'countries', 'priceable_id', 'priceable_type'));
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
			'price' => 'required',
			'enabled' => 'required',
			// 'entity' => 'required'
		]);

        $requestData = $request->all();

        if ($requestData['date_start']) {
            $requestData['date_start'] = Carbon::createFromFormat('d M, Y', $requestData['date_start'])->format('Y-m-d');
        }
        if ($requestData['date_end']) {
            $requestData['date_end'] = Carbon::createFromFormat('d M, Y', $requestData['date_end'])->format('Y-m-d');
        }

        $price = Price::findOrFail($id);
        $price->update($requestData);

        return redirect($price->priceable->backendLink())->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        Price::destroy($id);

        return redirect('admin/prices')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }
}
