<?php

namespace App\Http\Livewire;

use App\Models\Log;
use App\Models\Role;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileBankRoleOptions extends Component
{
    protected $listeners = [
        '$refresh'
    ];

    public $amount;
    public $currency = "USD";

    public function render()
    {
        $role = Role::where('name', '=', 'bank')->firstOrFail();
        $transactions = Auth::user()->transactions;
        return view('livewire.profile-bank-role-options', compact('role', 'transactions'));
    }

    public function tx($type) {

        $tx = Transaction::create([
            'user_id' => Auth::user()->id,
            'amount' => $this->amount,
            'type' => $type,
            'currency' => $this->currency
        ]);

        Log::create([
            'title' => 'Se ha insertado ' . $type == 'in' ? 'un depósito' : 'una extracción' . ' (' . $this->amount . ' ' . $this->currency . ') por ' . auth()->user()->name,
            'logable_id' => $tx->id,
            'logable_type' => 'App\\Models\\Transaction',
            'user_id' => auth()->user()->id
        ]);

        $this->amount = "";

        $this->emitTo('profile-bank-role-options', '$refresh');
        $this->emitTo('profile-remittances-tab', '$refresh');
        $this->emit('saved');
    }
}
