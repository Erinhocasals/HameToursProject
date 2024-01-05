<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function fortify() {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect(RouteServiceProvider::HOME);
        }
        else {
            return redirect(route('verification.notice'));
        }
    }

    public function emailVerification (EmailVerificationRequest $request) {
        $request->fulfill();

        $user = Auth::user();

        Log::create([
            'title' => 'Se ha activado la cuenta del usuario ' . $user->name,
            'logable_id' => $user->id,
            'logable_type' => 'App\\Models\\User',
            'user_id' => $user->id
        ]);

        return redirect(route('home'))->with('success', 'Se ha activado su cuenta exitosamente!');
    }

    public function emailNotification (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Hemos reenviado un correo a su dirección!');
    }
}
