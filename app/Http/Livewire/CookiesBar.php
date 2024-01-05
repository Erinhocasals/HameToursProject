<?php

namespace App\Http\Livewire;

use App\Models\Template;
use Livewire\Component;

class CookiesBar extends Component
{
    public function render()
    {
        $cookie = Template::where('friendly', '=', 'cookies-bar')->firstOrFail();
        return view('livewire.cookies-bar', compact('cookie'));
    }
}
