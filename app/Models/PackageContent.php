<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageContent extends Model
{
    use HasFactory;

    /**
     * Get the parent contentable model
     */
    public function contentable()
    {
        return $this->morphTo(); 
    }

    public function time()
    {
        return $this->belongsTo(PackageTime::class, 'time_id', 'id');
    }

    public function isEntity() {
        return strpos($this->contentable_type, 'Entity') != 0;
    }
}
