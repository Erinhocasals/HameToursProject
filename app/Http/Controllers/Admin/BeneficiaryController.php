<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Beneficiary;
use Illuminate\Http\Request;

class BeneficiaryController extends Controller
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
            $beneficiary = Beneficiary::where('name', 'LIKE', "%$keyword%")
                ->orWhere('identification', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $beneficiary = Beneficiary::latest()->paginate($perPage);
        }

        return view('admin.beneficiary.index', compact('beneficiary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.beneficiary.create');
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
			'name' => 'required|max:256',
			'phone' => 'required',
			'address' => 'required',
			'identification' => 'required'
		]);
        $requestData = $request->all();
        
        Beneficiary::create($requestData);

        return redirect('admin/beneficiary')->with('flash_message', 'Beneficiary added!');
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
        $beneficiary = Beneficiary::findOrFail($id);

        return view('admin.beneficiary.show', compact('beneficiary'));
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
        $beneficiary = Beneficiary::findOrFail($id);

        return view('admin.beneficiary.edit', compact('beneficiary'));
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
			'name' => 'required|max:256',
			'phone' => 'required',
			'address' => 'required',
			'identification' => 'required'
		]);
        $requestData = $request->all();
        
        $beneficiary = Beneficiary::findOrFail($id);
        $beneficiary->update($requestData);

        return redirect('admin/beneficiary')->with('flash_message', 'Beneficiary updated!');
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
        Beneficiary::destroy($id);

        return redirect('admin/beneficiary')->with('flash_message', 'Beneficiary deleted!');
    }
}
