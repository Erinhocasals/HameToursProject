<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KYC;
use App\Models\Reservation;
use App\Models\ReservationElement;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;

class AdminController extends Controller
{
    public function dashboard()
    {
        $reservations['total'] = Reservation::all()->count();
        $reservations['open'] = Reservation::whereHas('status', function($q) {
            $q->where('status', '=', 0);
        })->get()->count();
        $reservations['pending'] = Reservation::whereHas('status', function($q) {
            $q->where('status', '=', 1);
        })->get()->count();

        $remittances = ReservationElement::whereHas('reservation', function($r) {
                $r->whereHas('status', function($s) {
                    // $s->whereNotIn('status', [0,2,3]);
                    $s->where('status', '=', 7);
                });
            })
            /*->whereHas('elementable', function($e) {
                $e->where('bank_interaction', '=', true);
            })*/->get();

        $mon = date('Y-m-d', strtotime('monday this week'));
        $tue = date('Y-m-d', strtotime('tuesday this week'));
        $wed = date('Y-m-d', strtotime('wednesday this week'));
        $thu = date('Y-m-d', strtotime('thursday this week'));
        $fri = date('Y-m-d', strtotime('friday this week'));
        $sat = date('Y-m-d', strtotime('saturday this week'));
        $sun = date('Y-m-d', strtotime('sunday this week'));

        $chart = [
            array(
                'day' => 'Lunes',
                'reservations' => Reservation::where('created_at', '>=', $mon . ' 00:00:00')->where('created_at', '<=', $mon . ' 23:59:59')->get()->count(),
                'open' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 0); })->where('created_at', '>=', $mon . ' 00:00:00')->where('created_at', '<=', $mon . ' 23:59:59')->get()->count(),
                'pending' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 1); })->where('created_at', '>=', $mon . ' 00:00:00')->where('created_at', '<=', $mon . ' 23:59:59')->get()->count(),
            ),
            array(
                'day' => 'Martes',
                'reservations' => Reservation::where('created_at', '>=', $tue . ' 00:00:00')->where('created_at', '<=', $tue . ' 23:59:59')->get()->count(),
                'open' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 0); })->where('created_at', '>=', $tue . ' 00:00:00')->where('created_at', '<=', $tue . ' 23:59:59')->get()->count(),
                'pending' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 1); })->where('created_at', '>=', $tue . ' 00:00:00')->where('created_at', '<=', $tue . ' 23:59:59')->get()->count(),
            ),
            array(
                'day' => 'Miércoles',
                'reservations' => Reservation::where('created_at', '>=', $wed . ' 00:00:00')->where('created_at', '<=', $wed . ' 23:59:59')->get()->count(),
                'open' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 0); })->where('created_at', '>=', $wed . ' 00:00:00')->where('created_at', '<=', $wed . ' 23:59:59')->get()->count(),
                'pending' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 1); })->where('created_at', '>=', $wed . ' 00:00:00')->where('created_at', '<=', $wed . ' 23:59:59')->get()->count(),
            ),
            array(
                'day' => 'Jueves',
                'reservations' => Reservation::where('created_at', '>=', $thu . ' 00:00:00')->where('created_at', '<=', $thu . ' 23:59:59')->get()->count(),
                'open' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 0); })->where('created_at', '>=', $thu . ' 00:00:00')->where('created_at', '<=', $thu . ' 23:59:59')->get()->count(),
                'pending' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 1); })->where('created_at', '>=', $thu . ' 00:00:00')->where('created_at', '<=', $thu . ' 23:59:59')->get()->count(),
            ),
            array(
                'day' => 'Viernes',
                'reservations' => Reservation::where('created_at', '>=', $fri . ' 00:00:00')->where('created_at', '<=', $fri . ' 23:59:59')->get()->count(),
                'open' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 0); })->where('created_at', '>=', $fri . ' 00:00:00')->where('created_at', '<=', $fri . ' 23:59:59')->get()->count(),
                'pending' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 1); })->where('created_at', '>=', $fri . ' 00:00:00')->where('created_at', '<=', $fri . ' 23:59:59')->get()->count(),
            ),
            array(
                'day' => 'Sábado',
                'reservations' => Reservation::where('created_at', '>=', $sat . ' 00:00:00')->where('created_at', '<=', $sat . ' 23:59:59')->get()->count(),
                'open' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 0); })->where('created_at', '>=', $sat . ' 00:00:00')->where('created_at', '<=', $sat . ' 23:59:59')->get()->count(),
                'pending' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 1); })->where('created_at', '>=', $sat . ' 00:00:00')->where('created_at', '<=', $sat . ' 23:59:59')->get()->count(),
            ),
            array(
                'day' => 'Domingo',
                'reservations' => Reservation::where('created_at', '>=', $sun . ' 00:00:00')->where('created_at', '<=', $sun . ' 23:59:59')->get()->count(),
                'open' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 0); })->where('created_at', '>=', $sun . ' 00:00:00')->where('created_at', '<=', $sun . ' 23:59:59')->get()->count(),
                'pending' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 1); })->where('created_at', '>=', $sun . ' 00:00:00')->where('created_at', '<=', $sun . ' 23:59:59')->get()->count(),
            ),
        ];

        $stacked = array();
        for ($i = 1; $i <= 12; $i++) {
            $stacked[] = array(
                'month' => date("M", mktime(0, 0, 0, $i, 1)),
                'reservations' => Reservation::whereMonth('created_at', $i)->count(),
                'open' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 0); })->whereMonth('created_at', $i)->count(),
                'pending' => Reservation::whereHas('status', function($q) { $q->where('status', '=', 1); })->whereMonth('created_at', $i)->count()
            );
        }

        $users = User::all();

        $agencies = array();
        if (Auth::user()->hasRole('agency')) {
            $contents = Auth::user()->ownedEditableContents;
            $agencies = $contents->where('editable_type', '=', 'App\\Models\\Category');
        }

        $kyc = KYC::where('approved', '=', false)->get();

        $txs = Transaction::all()->groupBy('currency');
        $transactions = array();
        foreach($txs as $key => $value) {
            $sum =  $value->sum(function ($s) {
                return $s->type == 'in' ? $s->amount : -($s->amount);
            });

            $elem['key'] = $key;
            $elem['value'] = $sum;
            $transactions[] = $elem;
        }

        return view('admin.dashboard', compact('reservations', 'remittances', 'users', 'chart', 'stacked', 'agencies', 'kyc', 'transactions'));
    }


}
