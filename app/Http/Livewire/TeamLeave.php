<?php

namespace App\Http\Livewire;

use Laravel\Jetstream\Events\TeamMemberRemoved;
use Livewire\Component;

class TeamLeave extends Component
{
    public $otherTeam = false;

    protected $listeners = [
        '$refresh'
    ];

    public function render()
    {
        $this->otherTeam = auth()->user()->current_team_id != auth()->user()->ownedTeams->first()->id;
        return view('livewire.team-leave', ['otherTeam' => $this->otherTeam]);
    }

    public function leaveTeam() {
        $user = auth()->user();

        $team = $user->currentTeam;
        $team->users()->detach($user);

        $user->current_team_id = $user->ownedTeams->first()->id;
        $user->save();

        $team->save();

        TeamMemberRemoved::dispatch($team, $user);

        $this->emitTo('team-leave', '$refresh');
        $this->emit('saved');
    }
}
