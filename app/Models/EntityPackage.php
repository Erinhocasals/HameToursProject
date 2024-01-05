<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EntityPackage extends Pivot
{
    use HasFactory;

    protected $table = 'entity_packages';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['time', 'time_definition', 'entity_id', 'package_id'];

    public function package() {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function entity() {
        return $this->belongsTo(Entity::class, 'entity_id');
    }
}
