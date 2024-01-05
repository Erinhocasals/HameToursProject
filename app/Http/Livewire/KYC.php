<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\KYC as ModelsKYC;
use App\Models\Location;
use App\Models\Log;
use App\Models\Template;
use Livewire\Component;
use Livewire\WithFileUploads;

class KYC extends Component
{
    use WithFileUploads;
    public $identity;
    public $address;
    public $image;
    public $area;
    public $municipalities = [];

    public function render()
    {
        $user = auth()->user();

        if ($user->kyc) {
            $this->identity = $user->kyc->identity;
            $this->address = $user->kyc->address;
            $this->area = $user->kyc->work_area;
        }

        $template = Template::where('friendly', '=', 'kyc')->firstOrFail();
        $locations = Location::where('enabled', '=', true)->orderBy('id_provincia')->get();
        return view('livewire.k-y-c', compact('template', 'locations'));
    }

    public function update() {
        $user = auth()->user();

        $data = $this->validate([
            'identity' => 'required',
            'address' => 'required',
            'area' => '',
            'image' => '',
        ]);

        if (!$user->kyc && !isset($data['image'])) {
            session()->flash('error', 'Asegúrese de subir una imagen de un documento de identidad');
        }
        else {
            $prevKYC = ModelsKYC::where('user_id', '=', $user->id)->first();

            $kyc = ModelsKYC::updateOrCreate(['user_id' => $user->id], [
                'identity' => $data['identity'],
                'address' => $data['address'],
                'work_area' => ''
            ]);
            $kyc->locations()->sync($this->municipalities);

            if (isset($data['image'])) {
                if ($kyc->image) {
                    $kyc->image->deleteImage(true);
                }
                (new Image())->storeImage($data['image'], ModelsKYC::class, $kyc->id, 'kyc', false);
            }

            Log::create([
                'title' => 'Se ha ' . ($prevKYC ? 'modificado' : 'enviado') . ' la solicitud de KYC por parte de (' . $user->name . ')',
                'logable_id' => $kyc->id,
                'logable_type' => class_basename($kyc),
                'user_id' => $user->id
            ]);

            if ($prevKYC) {
                session()->flash('success', 'Se han actualizado sus datos KYC.');
            }
            else {
                session()->flash('success', 'Hemos recibido sus datos KYC, en cuanto lo aprobemos podrá utilizar los roles Mensajero y Banquero.');
            }

            $this->emit('saved');

        }
    }
}
