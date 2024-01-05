<?php

namespace App\Models;

use App\Mail\ReservationConfirmationMail;
use App\Mail\ReservationRemittanceMail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class ReservationElement extends Model
{
    use HasFactory;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['content', 'quantity', 'elementable_type', 'elementable_id', 'parentable_id', 'parentable_type', 'reservation_id', 'price', 'referral'];

    public function elementable()
    {
        return $this->morphTo();
    }

    public function parentable()
    {
        return $this->morphTo();
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function priceRelation()
    {
        return $this->belongsTo(Price::class, 'price_id', 'id');
    }

    public function type() {
        return class_basename($this->elementable);
    }

    public function banker()
    {
        return $this->belongsTo(User::class, 'bank_id', 'id');
    }

    public function messenger()
    {
        return $this->belongsTo(User::class, 'messenger_id', 'id');
    }

    public function backendLink() {
        return redirect(route('admin.reservations.show', ['reservation' => $this->reservation->id]));
    }

    public function referralOwner() {
        $owner = UserShareContent::where('referral', '=', $this->referral)->first()->user_id;
        return User::where('id', '=', $owner)->first();
    }

    public function referralData() {
        return UserShareContent::where('referral', '=', $this->referral)->first();
    }

    public function canClientConfirm() {
        $completed = Carbon::parse($this->messenger_response_at);
        $current = Carbon::now();
        $diff = $current->diffInHours($completed, true);

        $data = Data::where('key', '=', 'global')->first();

        return ($data && $data->time_client_to_confirm && ($diff < $data->time_client_to_confirm) && $this->client_confirmation_at == null) ? true : false;
    }

    public function isConfirmed() {
        $completed = Carbon::parse($this->messenger_response_at);
        $current = Carbon::now();
        $diff = $current->diffInHours($completed, true);

        $data = Data::where('key', '=', 'global')->first();

        return ($data && $data->time_client_to_confirm && ($this->client_confirmation_at != null || ($this->client_confirmation_at == null && $diff > $data->time_client_to_confirm) )) ? true : false;
    }

    public function remaining() {
        if ($this->messenger_taken_at == null)
            return -1;

        $settings = Data::where('key', '=', 'time')->firstOrFail();

        $end = Carbon::parse($this->messenger_taken_at);
        $end->addHours($settings->value);
        $current = Carbon::now();

        $diff = $current->diffInHours($end, false);

        if ($diff < 0) {

            Mail::to($this->banker->email)->send(new ReservationRemittanceMail([
                "subject" => "Ha vencido el tiempo de respuesta para la oferta (" . $this->elementable->title . ")",
                "user" => $this->banker,
                "template" => [
                    'title' => "Vencimiento",
                    'content' => "Ha vencido el tiempo de respuesta para la oferta (" . $this->elementable->title . "). La oferta vuelve a estar disponible para todos los usuarios.",
                    'action_title' => 'Ver ofertas',
                    'action_url' => route('profile.show')
                ]
            ]));

            if ($this->messenger) {
                Mail::to($this->messenger->email)->send(new ReservationRemittanceMail([
                    "subject" => "Ha vencido el tiempo de respuesta para la oferta (" . $this->elementable->title . ")",
                    "user" => $this->messenger,
                    "template" => [
                        'title' => "Vencimiento",
                        'content' => "Ha vencido el tiempo de respuesta para la oferta (" . $this->elementable->title . "). La oferta vuelve a estar disponible para todos los usuarios.",
                        'action_title' => 'Ver ofertas',
                        'action_url' => route('profile.show')
                    ]
                ]));
            }

            Log::create([
                'title' => "Ha vencido el tiempo de respuesta para la oferta (" . $this->elementable->title . ") por " . $this->banker->name,
                'logable_id' => $this->id,
                'logable_type' => "App\\Models\\ReservationElement",
                'user_id' => $this->banker->id
            ]);

            $this->bank_id = null;
            $this->taken_at = null;
            $this->messenger_id = null;
            $this->messenger_taken_at = null;
            $this->save();

            return $current->diffInHours($end, false);
        }
        else {
            return $end->diff($current, false)->format('%H:%I:%S');
        }
    }

    public function remainingSeconds() {
        if ($this->messenger_taken_at == null)
            return -1;

        $settings = Data::where('key', '=', 'time')->firstOrFail();

        $start = Carbon::parse($this->messenger_taken_at);
        $end = Carbon::parse($this->messenger_taken_at);
        $end->addHours($settings->value);
        $current = Carbon::now();

        return $end->diffInSeconds($current, true);
    }

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}
