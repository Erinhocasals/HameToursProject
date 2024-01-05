<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\Log;
use Livewire\Component;

class AdminNav extends Component
{
    public function render()
    {
        $logs = Log::latest()->where('status', '=', 0)->take(10)->get();
        $total = Log::latest()->where('status', '=', 0)->count();

        $contacts = Contact::latest()->take(10)->get();
        $total_contacts = Contact::all()->count();
        return view('livewire.admin-nav', compact('logs', 'total', 'contacts', 'total_contacts'));
    }
}
