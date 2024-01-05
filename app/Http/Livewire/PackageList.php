<?php

namespace App\Http\Livewire;

use App\Models\Template;
use Livewire\Component;

class PackageList extends Component
{
    public $packages;

    public function render()
    {
        $packagetemplate = Template::where('friendly', '=', 'paquetes-destacados')->firstOrFail();

        return view('livewire.package-list', compact('packagetemplate'));
    }
}
