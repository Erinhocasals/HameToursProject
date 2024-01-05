<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Mail\ReservationRemittanceMail;
use App\Models\KYC;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KYCController extends Controller
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
            $kyc = KYC::latest()->paginate($perPage);
        } else {
            $kyc = KYC::latest()->paginate($perPage);
        }

        return view('admin.kyc.index', compact('kyc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.kyc.create');
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

        KYC::create($requestData);

        return redirect('admin/kyc')->with('success', 'KYC added!');
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
        $kyc = KYC::findOrFail($id);

        return view('admin.kyc.show', compact('kyc'));
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
        $kyc = KYC::findOrFail($id);

        $kyc->approved = !$kyc->approved;
        $kyc->save();

        if (!$kyc->approved) {
            if ($kyc->user->hasRole('messenger')) {
                $kyc->user->removeRole('messenger');
            }

            if ($kyc->user->hasRole('bank')) {
                $kyc->user->removeRole('bank');
            }

            try {
                Mail::to($kyc->user->email)->send(new ReservationRemittanceMail([
                    "subject" => "Se ha cancelado su solicitud KYC",
                    "user" => $kyc->user,
                    "template" => [
                        'title' => "Se ha cancelado su solicitud KYC",
                        'content' => 'Se ha cancelado su solicitud. Cualquier queja o sugerencia por favor contacte con nosotros a través del formulario de contacto en nuestro sitio web:
                            ',
                        'action_title' => 'Ir a mi perfil',
                        'action_url' => route('profile.show')
                    ]
                ]));
            }
            catch(Exception $ex) {}
        }
        else {
            try {
                Mail::to($kyc->user->email)->send(new ReservationRemittanceMail([
                    "subject" => "Se ha aprobado su solicitud KYC",
                    "user" => $kyc->user,
                    "template" => [
                        'title' => "Se ha aprobado su solicitud KYC",
                        'content' => 'Se ha aprobado su solicitud. Ahora puede hacer uso de los roles Banquero y Mensajero. Cualquier queja o sugerencia por favor contacte con nosotros a través del formulario de contacto en nuestro sitio web:
                            ',
                        'action_title' => 'Ir a mi perfil',
                        'action_url' => route('profile.show')
                    ]
                ]));
            }
            catch(Exception $ex) {}
        }

        return redirect(route('admin.kyc.show', ['kyc' => $kyc->id]))->with('success', 'Se ha actualizado el elemento exitosamente!');

        //return view('admin.kyc.edit', compact('kyc'));
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

        $requestData = $request->all();

        $kyc = KYC::findOrFail($id);
        $kyc->update($requestData);

        return redirect('admin/kyc')->with('success', 'KYC updated!');
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
        KYC::destroy($id);

        return redirect('admin/kyc')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }
}
