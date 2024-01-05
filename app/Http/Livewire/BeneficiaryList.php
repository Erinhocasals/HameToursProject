<?php

namespace App\Http\Livewire;

use App\Models\Beneficiary;
use App\Models\Template;
use Livewire\Component;

class BeneficiaryList extends Component
{
    protected $listeners = [
        '$refresh'
    ];

    public function render()
    {
        $template = Template::where('friendly', '=', 'beneficiary-list')->firstOrFail();
        return view('livewire.beneficiary-list', compact('template'));
    }

    public function delete($id) {
        Beneficiary::destroy($id);
        $this->emit('saved');
    }
}
