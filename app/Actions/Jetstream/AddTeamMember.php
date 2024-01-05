<?php

namespace App\Actions\Jetstream;

use App\Models\Invitation;
use App\Models\Log;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\AddsTeamMembers;
use Laravel\Jetstream\Events\AddingTeamMember;
use Laravel\Jetstream\Events\TeamMemberAdded;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\Rules\Role;

class AddTeamMember implements AddsTeamMembers
{
    /**
     * Add a new team member to the given team
     * This function is executed when user accepts an invitation
     *
     * @param  mixed  $user
     * @param  mixed  $team
     * @param  string  $email
     * @param  string|null  $role
     * @return void
     */
    public function add($user, $team, string $email, string $role = null)
    {
        Gate::forUser($user)->authorize('addTeamMember', $team);

        $this->validate($team, $email, $role);

        $newTeamMember = Jetstream::findUserByEmailOrFail($email);

        if ($newTeamMember) {
            $team->users()->attach($newTeamMember);
            $newTeamMember->current_team_id = $team->id;
            $newTeamMember->save();

            TeamMemberAdded::dispatch($team, $newTeamMember);

            Log::create([
                'title' => $email . ' ha aceptado la invitación de ' . $user->name,
                'logable_id' => $user->id,
                'logable_type' => 'App\\Models\\User',
                'user_id' => $user->id
            ]);
        } else { // this will probably never be executed
            dd('y si si');

            $invitation = Invitation::create([
                'user_id' => $user->id,
                'team_id' => $team->id,
                'email' => $email,
            ]);
            $invitation->sendEmailInviteNotification(false);
        }
        ## END EDIT ##
    }


    /**
     * Validate the add member operation.
     *
     * @param  mixed  $team
     * @param  string  $email
     * @param  string|null  $role
     * @return void
     */
    protected function validate($team, string $email, ?string $role)
    {
        Validator::make([
            'email' => $email,
            // 'role' => $role,
        ], $this->rules(), [
            'email.exists' => __('We were unable to find a registered user with this email address.'),
        ])->after(
            $this->ensureUserIsNotAlreadyOnTeam($team, $email)
        )->validateWithBag('addTeamMember');
    }

    /**
     * Get the validation rules for adding a team member.
     *
     * @return array
     */
    protected function rules()
    {
        ## BEGIN EDIT - comment out exists:users check  ##
        return array_filter([
            'email' => [
                'required',
                'email',
                // 'exists:users',
            ]
        ]);
        ## END EDIT ##

        // return array_filter([
        //     'email' => ['required', 'email', 'exists:users'],
        //     'role' => Jetstream::hasRoles()
        //                     ? ['required', 'string', new Role]
        //                     : null,
        // ]);
    }

    /**
     * Ensure that the user is not already on the team.
     *
     * @param  mixed  $team
     * @param  string  $email
     * @return \Closure
     */
    protected function ensureUserIsNotAlreadyOnTeam($team, string $email)
    {
        return function ($validator) use ($team, $email) {
            $validator->errors()->addIf(
                $team->hasUserWithEmail($email),
                'email',
                __('This user already belongs to the team.')
            );
        };
    }
}
