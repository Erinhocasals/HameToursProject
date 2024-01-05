<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use Sluggable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'experiences';

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
    protected $fillable = ['title', 'summary', 'content', 'friendly', 'enabled'];

    public function sluggable()
    {
        return [
            'friendly' => [
                'source' => 'title'
            ]
        ];
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function entities() {
        return $this->belongsToMany(Entity::class, 'entity_experiences', 'experience_id', 'entity_id');
    }

    public function backendLink() {
        return route('admin.entity-experiences.show', ['experience' => $this]);
    }
}
