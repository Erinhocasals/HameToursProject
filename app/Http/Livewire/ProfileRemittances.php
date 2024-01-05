<?php

namespace App\Http\Livewire;

use App\Mail\ReservationRemittanceMail;
use App\Models\Log;
use App\Models\ReservationElement;
use App\Models\Transaction;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ProfileRemittances extends Component
{
    public $polling = true;

    protected $listeners = [
        '$refresh'
    ];

    public function render()
    {
        //$expired = auth()->user()->expired();
        //dd($expired);
        return view('livewire.profile-remittances');
    }

    public function togglePolling() {
        $this->polling = !$this->polling;
    }

    public function check($element_id, $confirmation) {
        $user = Auth::user();
        $reservation_element = ReservationElement::findOrFail($element_id);

        if ($reservation_element->banker_check_at == null && $user->hasRole('bank') && $confirmation == "bank") {
            $reservation_element->banker_check_at = now();

            Log::create([
                'title' => 'Se ha confirmado la entrega de dinero de (' . $reservation_element->elementable->title . ') por el banquero ' . $user->name,
                'logable_id' => $reservation_element->elementable->id,
                'logable_type' => class_basename($reservation_element->elementable),
                'user_id' => $user->id
            ]);

            // restar con transaccion el deposito
        }

        if ($reservation_element->messenger_check_at == null && $user->hasRole('messenger') && $confirmation == "messenger") {
            $reservation_element->messenger_check_at = now();

            Log::create([
                'title' => 'Se ha confirmado el recibo de dinero de (' . $reservation_element->elementable->title . ') por el mensajero ' . $user->name,
                'logable_id' => $reservation_element->elementable->id,
                'logable_type' => class_basename($reservation_element->elementable),
                'user_id' => $user->id
            ]);

            // Transaction::create([
            //     'currency' => $reservation_element->elementable->bank_currency,
            //     'amount' => $reservation_element->quantity * $reservation_element->elementable->bank_delivery_amount,
            //     'type' => 'out',
            //     'user_id' => $reservation_element->bank_id
            // ]);
        }

        $reservation_element->save();

        $this->emitTo('profile-remittances', '$refresh');
        $this->emit('saved');
    }

    public function take($element_id) {
        $user = Auth::user();

        $reservation_element = ReservationElement::findOrFail($element_id);

        if ($reservation_element->bank_id == null && $user->hasRole('bank')) {
            $reservation_element->bank_id = $user->id;
            $reservation_element->taken_at = now();

            Log::create([
                'title' => 'Se ha reservado el elemento (' . $reservation_element->elementable->title . ') por el banquero ' . $user->name,
                'logable_id' => $reservation_element->elementable->id,
                'logable_type' => class_basename($reservation_element->elementable),
                'user_id' => $user->id
            ]);
        }
        elseif ($reservation_element->bank_id != null && $user->hasRole('messenger')) {
            if ($reservation_element->messenger_id && $reservation_element->messenger_id != $user->id) {
                $this->emit('La oferta ha sido reservada por otro agente');
                return;
            }

            $reservation_element->messenger_id = $user->id;
            $reservation_element->messenger_taken_at = now();

            Log::create([
                'title' => 'Se ha reservado el elemento (' . $reservation_element->elementable->title . ') por el mensajero ' . $user->name,
                'logable_id' => $reservation_element->elementable->id,
                'logable_type' => class_basename($reservation_element->elementable),
                'user_id' => $user->id
            ]);

            if ($reservation_element->banker->id != $reservation_element->messenger->id) {
                try {
                    Mail::to($reservation_element->banker->email)->send(new ReservationRemittanceMail([
                        "subject" => "Un mensajero ha reservado la oferta (" . $reservation_element->elementable->title . ")",
                        "user" => $reservation_element->messenger,
                        "template" => [
                            'title' => "Nueva reservación por mensajero",
                            'content' => 'El mensajero <b>' . $reservation_element->messenger->name . '</b> ha reservado la oferta (' . $reservation_element->elementable->title . '). Puede contactar con él mediante la siguiente tarjeta de información:
                                <div class="text-center mt-3" style="text-align:center; margin-top: 3rem; display: flex; flex-direction: column; align-items: center; background: darkorange;border-radius: 1rem;color: white;padding: 1em;">
                                    <div class="profile-photo" style="display:flex; justify-content: center">
                                        <img src="' . $reservation_element->messenger->profile_photo_url . '" width="100" class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-4 mb-3" style="margin-top: 1rem; margin-bottom: 1rem; font-size: 30px; line-height: 30px">' . $reservation_element->messenger->name . '</h3>
                                    <p class="text-muted"><i class="fa fa-phone"></i>' . $reservation_element->messenger->phone . '</p>
                                    <p class="text-muted"><i class="fa fa-phone"></i>' . $reservation_element->messenger->email . '</p>
                                </div>',
                            'action_title' => 'Contactar',
                            'action_url' => 'tel:' . $reservation_element->messenger->phone
                        ]
                    ]));
                }
                catch(Exception $ex) {}
            }
        }

        $reservation_element->save();

        $this->emitTo('profile-remittances', '$refresh');
        // $this->emitTo('profile-remittances-tab', '$refresh');
        $this->emit('saved');
    }

    public function cancel($element_id) {
        $user = Auth::user();

        $reservation_element = ReservationElement::findOrFail($element_id);

        if ($user->hasRole('bank') && $reservation_element->bank_id == auth()->user()->id && $reservation_element->messenger_check_at == null) {
            Log::create([
                'title' => 'Se ha cancelado el elemento (' . $reservation_element->elementable->title . ') por el banquero ' . auth()->user()->name,
                'logable_id' => $reservation_element->elementable->id,
                'logable_type' => class_basename($reservation_element->elementable),
                'user_id' => auth()->user()->id
            ]);

            if ($reservation_element->messenger_id) {
                if ($reservation_element->banker->id != $reservation_element->messenger->id) {
                    try {
                        Mail::to($reservation_element->messenger->email)->send(new ReservationRemittanceMail([
                            "subject" => "El dueño ha cancelado la oferta (" . $reservation_element->elementable->title . ")",
                            "user" => $reservation_element->banker,
                            "template" => [
                                'title' => "Oferta Cancelada",
                                'content' => 'El dueño <b>' . $reservation_element->banker->name . '</b> ha cancelado la oferta (' . $reservation_element->elementable->title . '). La oferta vuelve a estar disponible hasta que un banquero la retome.',
                                'action_title' => 'Ir al perfil',
                                'action_url' => route('profile.show')
                            ]
                        ]));
                    }
                    catch(Exception $ex) {}
                }
            }

            $reservation_element->bank_id = null;
            $reservation_element->taken_at = null;
            $reservation_element->messenger_id = null;
            $reservation_element->messenger_taken_at = null;
            $reservation_element->banker_check_at = null;
            $reservation_element->messenger_check_at = null;
        }

        if ($user->hasRole('messenger') && $reservation_element->messenger_id == auth()->user()->id) {
            Log::create([
                'title' => 'Se ha cancelado el elemento (' . $reservation_element->elementable->title . ') por el mensajero ' . auth()->user()->name,
                'logable_id' => $reservation_element->elementable->id,
                'logable_type' => class_basename($reservation_element->elementable),
                'user_id' => auth()->user()->id
            ]);

            try {
                Mail::to($reservation_element->banker->email)->send(new ReservationRemittanceMail([
                    "subject" => "El mensajero ha cancelado la oferta (" . $reservation_element->elementable->title . ")",
                    "user" => $reservation_element->messenger,
                    "template" => [
                        'title' => "Oferta Cancelada",
                        'content' => 'El mensajero <b>' . $reservation_element->messenger->name . '</b> ha cancelado la oferta (' . $reservation_element->elementable->title . '). La oferta vuelve a estar disponible hasta que un mensajero la retome.',
                        'action_title' => 'Ir al perfil',
                        'action_url' => route('profile.show')
                    ]
                ]));
            }
            catch(Exception $ex) {}

            $reservation_element->messenger_id = null;
            $reservation_element->messenger_taken_at = null;
            $reservation_element->banker_check_at = null;
            $reservation_element->messenger_check_at = null;
        }

        $reservation_element->save();

        $this->emitTo('profile-remittances', '$refresh');
        $this->emitTo('profile-remittances-tab', '$refresh');
        $this->emit('saved');
    }
}
