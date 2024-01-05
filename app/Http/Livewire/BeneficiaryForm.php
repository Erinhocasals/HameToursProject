<?php

namespace App\Http\Livewire;

use App\Models\Beneficiary;
use App\Models\Location;
use App\Models\Log;
use App\Models\Template;
use Livewire\Component;

class BeneficiaryForm extends Component
{
    public $identification;
    public $name;
    public $address;
    public $phone;
    public $email;
    public $location_id;

    public function render()
    {
        $template = Template::where('friendly', '=', 'beneficiary-form')->firstOrFail();
        $locations = Location::where('enabled', '=', true)->get();
        return view('livewire.beneficiary-form', compact('template', 'locations'));
    }

    public function create() {
        $user = auth()->user();

        $data = $this->validate([
            'name' => 'required',
            'identification' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => '',
            'location_id' => 'required'
        ]);

        $prev = Beneficiary::where('identification', '=', $data['identification'])->first();
        if ($prev) {
            session()->flash('error', 'Ya existe un beneficiario creado con ese número de identificación.');
        }
        else {
            $beneficiary = Beneficiary::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'identification' => $data['identification'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'location_id' => $data['location_id']
            ]);

            Log::create([
                'title' => 'El usuario ' . $user->name . ' ha adicionado un nuevo beneficiario (' . $data['name'] . ')',
                'logable_id' => $beneficiary->id,
                'logable_type' => class_basename($beneficiary),
                'user_id' => $user->id
            ]);

            // session()->flash('success', 'Se han salvado los datos exitosamente.');
            $this->name = $this->identification = $this->address = $this->phone = $this->email = "";
        }

        $this->emit('saved');
        $this->emitTo('beneficiary-list', '$refresh');
    }
}
