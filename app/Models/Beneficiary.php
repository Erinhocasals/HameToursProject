<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'beneficiaries';

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
    protected $fillable = ['name', 'identification', 'address', 'phone', 'email', 'user_id', 'location_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function reservationElements() {
        return $this->hasMany(ReservationElement::class, 'beneficiary_id');
    }
}
