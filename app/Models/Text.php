<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'texts';

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
    protected $fillable = ['title', 'content', 'enabled', 'textable_id', 'textable_type'];

    /**
     * Get the parent imageable model
     */
    public function textable()
    {
        return $this->morphTo();
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function backendLink() {
        return route('admin.texts.show', ['text' => $this]);
    }
}
