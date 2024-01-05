<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider) {
        try {
            $driveUser = Socialite::driver($provider)->user();

            if ($driveUser) {
                $user = User::where('email', '=', $driveUser->getEmail())->first();

                if ($user) {
                    Auth::login($user);

                    if (auth()->user()->hasRole(['super-admin', 'admin', 'editor'])) {
                        return redirect()->intended('admin/dashboard');
                    }
                    else {
                        return redirect('/');
                    }
                }

                $user = User::create([
                    'name' => $driveUser->getName(),
                    'email' => $driveUser->getEmail(),
                    'password' => bcrypt('alpha-test-no-usar'),
                ]);

                $user->sendEmailVerificationNotification();
                $user->roles()->sync(12);

                $user->ownedTeams()->save(Team::forceCreate([
                    'user_id' => $user->id,
                    'name' => explode(' ', $user->name, 2)[0]."'s Team",
                    'personal_team' => true,
                ]));

                Auth::login($user);
            }
        }
        catch(Exception $ex) {
            dd($ex);
        }

        return redirect('/');
    }
}
