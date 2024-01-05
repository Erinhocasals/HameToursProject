<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KYC extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'k_y_c_s';

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
    protected $fillable = ['identity', 'address', 'user_id', 'work_area'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'logable');
    }

    public function locations() {
        return $this->belongsToMany(Location::class, 'k_y_c_locations', 'kyc_id', 'location_id')->withTimestamps();
    }

    public function backendLink() {
        return route('admin.kyc.show', ['kyc' => $this->id]);
    }
}
