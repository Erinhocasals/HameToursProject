<?php

namespace App\Actions\Jetstream;

use App\Models\Invitation;
use App\Models\Log;
use App\Models\TeamInvitation as ModelsTeamInvitation;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Jetstream\Contracts\InvitesTeamMembers;
use Laravel\Jetstream\Events\InvitingTeamMember;
use Laravel\Jetstream\Events\TeamMemberAdded;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\Mail\TeamInvitation;
use Laravel\Jetstream\Rules\Role;
use Laravel\Jetstream\TeamInvitation as JetstreamTeamInvitation;

class InviteTeamMember implements InvitesTeamMembers
{
    /**
     * Invite a new team member to the given team.
     *
     * @param  mixed  $user
     * @param  mixed  $team
     * @param  string  $email
     * @param  string|null  $role
     * @return void
     */
    public function invite($user, $team, string $email, string $role = null)
    {
        Gate::forUser($user)->authorize('addTeamMember', $team);

        $role = 'editor';
        $this->validate($team, $email, $role);

        $newTeamMember = User::where('email', $email)->first();

        $teamInvitation = ModelsTeamInvitation::create([
            'team_id' => $team->id,
            'email' => $email,
            'role' => 'client'
        ]);

        if ($newTeamMember) {
            $teamInvitation->sendEmailInviteNotification(true);
        }
        else {
            $teamInvitation->generateReferralCode();
            $teamInvitation->sendEmailInviteNotification(false);
        }

        Log::create([
            'title' => auth()->user()->name . ' ha invitado a ' . $email . ' a unirse su equipo',
            'logable_id' => $user->id,
            'logable_type' => 'App\\Models\\User',
            'user_id' => $user->id
        ]);
    }

    /**
     * Validate the invite member operation.
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
        ], $this->rules($team), [
            'email.unique' => __('This user has already been invited to the team.'),
        ])->after(
            $this->ensureUserIsNotAlreadyOnTeam($team, $email)
        )->validateWithBag('addTeamMember');
    }

    /**
     * Get the validation rules for inviting a team member.
     *
     * @param  mixed  $team
     * @return array
     */
    protected function rules($team)
    {
        return array_filter([
            'email' => ['required', 'email', Rule::unique('team_invitations')->where(function ($query) use ($team) {
                $query->where('team_id', $team->id);
            })],
            // 'role' => Jetstream::hasRoles()
            //                 ? ['required', 'string', new Role]
            //                 : null,
        ]);
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
