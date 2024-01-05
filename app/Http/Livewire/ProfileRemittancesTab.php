<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProfileRemittancesTab extends Component
{
    protected $listeners = [
        '$refresh'
    ];

    public function render()
    {
        $count = count(auth()->user()->remittances());
        return view('livewire.profile-remittances-tab', compact('count'));
    }
}
