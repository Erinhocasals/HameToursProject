<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use Sluggable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'infos';

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
    protected $fillable = ['title', 'content', 'enabled', 'friendly', 'show_in_home', 'footer'];

    public function sluggable()
    {
        return [
            'friendly' => [
                'source' => 'title'
            ]
        ];
    }

    public function menu() {
        return $this->morphOne(MenuLink::class, 'menuable');
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function intro() {
        return $this->morphOne(Intro::class, 'introable');
    }

    public function texts()
    {
        return $this->morphMany(Text::class, 'textable');
    }

    public function backendLink() {
        return route('admin.infos.show', ['info' => $this]);
    }

    public function frontLink()
    {
        return url('info/'.$this->friendly);
    }
}
