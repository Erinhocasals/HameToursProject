<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLink extends Model
{
    use HasFactory;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['menu_id', 'menuable_id', 'menuable_type', 'url'];

    public function menuable()
    {
        return $this->morphTo();
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function setLink($menu_id, $menuable_type, $menuable_id, $url) {
        $this->menu_id = $menu_id;
        $this->menuable_type = $menuable_type;
        $this->menuable_id = $menuable_id;
        $this->url = $url;

        if ($this->id)
            $this->update();
        else
            $this->save();
    }
}
