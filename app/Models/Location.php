<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    public function kycs() {
        return $this->belongsToMany(KYC::class, 'k_y_c_locations', 'location_id', 'kyc_id')->withTimestamps();
    }

    public function beneficiaries() {
        return $this->hasMany(Beneficiary::class, 'location_id');
    }
}
