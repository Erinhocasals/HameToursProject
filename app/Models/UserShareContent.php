<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserShareContent extends Model
{
    use HasFactory;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['shareable_id', 'shareable_type', 'user_id', 'referral', 'tax'];

    /**
     * Get the parent introable model
     */
    public function shareable()
    {
        return $this->morphTo();
    }
}
