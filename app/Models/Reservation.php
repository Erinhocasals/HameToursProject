<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reservations';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['content', 'status_id', 'price', 'user_id'];

    public function logs()
    {
        return $this->morphMany(Log::class, 'logable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function elements()
    {
        return $this->hasMany(ReservationElement::class);
    }

    public function totalElements() {
        return $this->elements->sum('quantity');
    }

    public function totalPrice() {
        return $this->elements->sum(function ($s) {
            // $date_start = Carbon::parse($s->date_start);
            // $date_end = Carbon::parse($s->date_end);
            return $s->price * $s->quantity;
        });
    }

    public function totalRealPrice() {
        return $this->elements->sum(function ($s) {
            return $s->referral ? $s->priceRelation->price * $s->quantity : $s->price * $s->quantity;
        });
    }

    public function containsReferral() {
        return $this->elements->where('referral', '!=', null);
    }

    public function containsRemittance() {
        return $this->elements->where('bank_id', '!=', null);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function backendLink() {
        return route('admin.reservations.show', ['reservation' => $this]);
    }
}
