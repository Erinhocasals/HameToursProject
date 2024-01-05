<?php

namespace App\Models;

use App\Enums\ItinerarySection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageTime extends Model
{
    use HasFactory;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['time', 'definition', 'package_id', 'order', 'style', 'content'];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }
    
    public function contents()
    {
        return $this->hasMany(PackageContent::class, 'time_id', 'id');
    }

    public function style() {
        return ItinerarySection::fromValue($this->style);
    }
}
