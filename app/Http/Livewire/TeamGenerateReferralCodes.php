<?php

namespace App\Http\Livewire;

use App\Models\Log;
use App\Models\TeamInvitation;
use Livewire\Component;
use Faker\Factory as Faker;

class TeamGenerateReferralCodes extends Component
{
    public $teamInvitations;

    public function render()
    {
        $this->teamInvitations = auth()->user()->ownedTeams->first()->teamInvitations;
        return view('livewire.team-generate-referral-codes', ['teamInvitations' => $this->teamInvitations]);
    }

    public function generate() {
        $user = auth()->user();

        $faker = Faker::create();
        $email = $faker->unique()->safeEmail();

        $teamInvitation = TeamInvitation::create([
            'team_id' => $user->ownedTeams->first()->id,
            'email' => $email,
            'role' => 'client',
            'generic' => true
        ]);
        $teamInvitation->generateReferralCode();

        Log::create([
            'title' => $user->name . ' ha generado un nuevo código de referido genérico',
            'logable_id' => $user->id,
            'logable_type' => 'App\\Models\\User',
            'user_id' => $user->id
        ]);

        $this->emit('saved');
    }

    public function cancelTeamInvitation($id) {
        $teamInvitation = TeamInvitation::findOrFail($id);
        $teamInvitation->delete();

        $this->emit('saved');
    }

    public function copyToClipboard($id) {
        dd('qq');
    }
}
