<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'slides';

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
    protected $fillable = ['title', 'subtitle', 'content', 'enabled', 'slideable_id', 'slideable_type'];

    public function slideable()
    {
        return $this->morphTo();
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
