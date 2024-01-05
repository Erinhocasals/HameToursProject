<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use Sluggable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus';

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
    protected $fillable = ['title', 'content', 'enabled', 'style', 'grouped', 'friendly', 'subtitle', 'order', 'show_in_nav', 'show_in_footer', 'show_in_home'];

    public function sluggable()
    {
        return [
            'friendly' => [
                'source' => 'title'
            ]
        ];
    }

    public function links()
    {
        return $this->hasMany(MenuLink::class, 'menu_id');
    }

    public function backendLink() {
        return route('admin.menu.show', ['menu' => $this]);
    }

    public function styleName() {
        switch($this->style) {
            case 1:
                return "Menú Pantalla Completa";
            case 2:
                return "Menú Estándar";
        }

        return "";
    }
}
