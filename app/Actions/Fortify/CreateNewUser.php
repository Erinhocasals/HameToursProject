<?php

namespace App\Actions\Fortify;

use App\Models\Invitation;
use App\Models\Log;
use App\Models\Team;
use App\Models\TeamInvitation;
use App\Models\User;
use App\Rules\CheckReferralCodeRule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Events\TeamMemberAdded;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        if (isset($input['referral'])) {
            $invitation = TeamInvitation::where('referral', $input['referral'])->first();
            Validator::make($input, [
                'email' => [new CheckReferralCodeRule($invitation)]
            ])->validate();
        }

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'phone' => $input['phone'],
            ]), function (User $user) use($input) {
                $this->createTeam($user);
                $user->assignRole('client');

                if (isset($input['referral'])) {
                    if ($invitation = TeamInvitation::where('referral', $input['referral'])->first()) {
                        if ($team = $invitation->team) {
                            $team->users()->attach($user);
                            $user->current_team_id = $team->id;
                            $user->save();

                            if ($invitation->email == $user->email) {
                                //TeamMemberAdded::dispatch($team, $user);
                                $invitation->delete();
                            }

                            Log::create([
                                'title' => 'Se ha registrado un nuevo usuario (' . $user->name . ') con una invitación de (' . $team->owner->name . ')',
                                'logable_id' => $user->id,
                                'logable_type' => 'App\\Models\\User',
                                'user_id' => $user->id
                            ]);
                        }
                    }
                }
                ## END EDIT ##
                else {
                    Log::create([
                        'title' => 'Se ha registrado un nuevo usuario (' . $user->name . ')',
                        'logable_id' => $user->id,
                        'logable_type' => 'App\\Models\\User',
                        'user_id' => $user->id
                    ]);
                }
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
