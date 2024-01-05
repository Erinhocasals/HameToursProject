<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Tools\Tools;
use App\Mail\MarkDownMail;
use App\Mail\ReservationConfirmationMail;
use App\Mail\ReservationResponseMail;
use App\Models\Reservation;
use App\Models\ReservationElement;
use App\Models\Status;
use App\Models\Template;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
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

        $status = $request->get('status');

        if (!empty($keyword)) {
            if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
                $reservations = auth()->user()->agencyReservations();
            }
            else {
                $reservations = Reservation::where('content', 'LIKE', "%$keyword%");
            }

            $reservations->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%");

            $reservations->latest()->paginate($perPage);
        } else {
            if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
                $reservations = auth()->user()->agencyReservations()->paginate($perPage);
            }
            else {
                $reservations = Reservation::latest()->paginate($perPage);

                if (isset($status)) {
                    $reservations = Reservation::whereHas('status', function($q) use($status) {
                        $q->where('status', '=', $status);
                    })->latest()->paginate($perPage);
                }
            }
        }

        $statuses = Status::all();

        foreach ($reservations as $reservation) {
            foreach($reservation->elements as $element) {
                if ($element->elementable == null) {
                    //dd('www');
                    $element->delete();
                }
            }

            if (count($reservation->elements) == 0) {
                $reservation->delete();
            }
        }

        return view('admin.reservation.index', compact('reservations', 'statuses', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.reservation.create');
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

        Reservation::create($requestData);

        return redirect('admin/reservations')->with('success', 'Se ha adicionado el elemento exitosamente!');
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
        $reservation = Reservation::findOrFail($id);
        //$statuses = Status::all();

        if (Auth::user()->hasRole('agency') && !Auth::user()->hasAnyRole('super-admin|admin')) {
            $elements = $reservation->elements()->whereHas('elementable', function ($e) {
                $e->whereHas('editors', function($u) {
                    $u->where('user_id', '=', auth()->user()->id);
                });
            })->get();
        }
        else {
            $elements = $reservation->elements;
        }

        $statuses = new Collection();
        $reserved = Status::where('reserved', '=', true)->where('status', '!=', 0)->get();

        foreach($elements as $elem) {
            if ($elem->parentable) {
                $sts = Status::whereHas('definitions', function($q) use($elem) {
                    $q->where('categories.id', '=', $elem->parentable->id);
                })->get();

                if ($sts)
                    $statuses = $statuses->merge($sts);
            }
        }

        $statuses = $statuses->merge($reserved);
        $statuses = $statuses->sortBy('status');

        if (count($statuses) == 0) {
            $statuses = Status::whereNotIn('status', ['0,1']);
        }

        return view('admin.reservation.show', compact('reservation', 'elements', 'statuses'));
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
        $reservation = Reservation::findOrFail($id);

        return view('admin.reservation.edit', compact('reservation'));
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

        $reservation = Reservation::findOrFail($id);
        $reservation->update($requestData);

        return redirect('admin/reservations')->with('success', 'Se ha actualizado el elemento exitosamente!');
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
        Reservation::destroy($id);

        return redirect('admin/reservations')->with('success', 'Se ha eliminado el elemento exitosamente!');
    }

    public function response(Request $request, $id) {

        $reservation = Reservation::findOrFail($id);

        $status_id = $request->get('select-status');
        $status = Status::findOrFail($status_id);

        $message = $request->get('message');

        $reservation->status()->associate($status);
        $reservation->response = $message;
        $reservation->save();

        $template = Template::where('friendly', '=', 'mail-reservacion-actualizacion')->firstOrFail();

        try {
            Mail::to($reservation->user->email)->send(new ReservationResponseMail([
                "subject" => "Se ha actualizado el estado de su reservación",
                "user" => $reservation->user,
                "reservation" => $reservation,
                "template" => $template
            ]));
        }
        catch(Exception $ex) {}


        return redirect('admin/reservations/' . $id)->with('success', 'Se ha actualizado el elemento exitosamente!');
    }
}
