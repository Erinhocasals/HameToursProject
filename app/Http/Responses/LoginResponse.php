<?php

namespace App\Http\Responses;

use App\Models\Invitation;
use App\Models\Team;
use App\Models\TeamInvitation;
use Laravel\Fortify\Contracts\LoginResponse as ContractsLoginResponse;
use Laravel\Jetstream\Events\TeamMemberAdded;

class LoginResponse implements ContractsLoginResponse
{
    public function toResponse($request)
    {
        $user = auth()->user();

        // here i am checking if the currently logout in users has a role_id of 2 which make him a regular user and then redirect to the users dashboard else the admin dashboard
        if ($user->hasRole(['super-admin', 'admin', 'editor', 'agency'])) {
            return redirect()->intended('admin/dashboard');
        }

        if ($request->get('referral')) {
            $invitation = TeamInvitation::where('referral', '=', $request->get('referral'))->first();
            if (!$invitation) return redirect()->intended()->with('success', 'Código de referido inválido');

            $team = Team::find($invitation->team_id);
            if (!$team) return redirect()->intended();

            if ($user->current_team_id == $team->id) {
                return redirect()->intended()->with('success', 'Ya perteneces a este equipo');
            }
            if ($user->ownedTeams->first()->id == $user->currentTeam->id) {
                $team->users()->attach($user);
                $user->current_team_id = $invitation->team->id;
                $user->save();

                //TeamMemberAdded::dispatch($team, $user);
                return redirect()->intended()->with('success', 'Bienvenido al equipo de ' . $team->name);
            }
            else {
                return redirect()->intended()->with('success', 'Ya perteneces a otro equipo');
            }
        }

        if (!$user->hasVerifiedEmail())
            return redirect(route('verification.notice'));

        return redirect('/');
        //return redirect()->intended();
    }
}
