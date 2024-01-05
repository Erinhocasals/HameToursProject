<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusDefinition extends Model
{
    use HasFactory;

    protected $fillable = ['status_id', 'definition_id'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
