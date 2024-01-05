<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

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
    protected $fillable = ['title', 'subtitle', 'content', 'enabled', 'category_id', 'friendly', 'show_in_home', 'entities_intro', 'type', 'reservation_message', 'group_agencies'];

    protected $with = array('subcategories', 'intro', 'showcase');

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

    public function showcase() {
        return $this->morphOne(Showcase::class, 'showcaseable');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class);
    }

    public function enabledSubcategories() {
        return $this->hasMany(Category::class)->where('enabled', '=', true)->get();
    }

    public function reservation()
    {
        return $this->morphMany(ReservationElement::class, 'elementable');
    }

    public function entity_categories() {
        return $this->belongsToMany(EntityCategory::class, 'category_entity_categories', 'category_id', 'entity_category_id');
    }

    public function enabledEntityCategories() {
        return $this->entity_categories()->where('enabled', '=', true);
    }

    public function entities() {
        return $this->belongsToMany(EntityDefinition::class, 'entity_definitions', 'definition_id', 'entity_id')->withTimestamps();
    }

    public function filter_categories() {
        return $this->belongsToMany(FilterCategory::class, 'category_filter_categories', 'category_id', 'filter_category_id');
    }

    public function packages() {
        return $this->belongsToMany(Package::class, 'definition_package', 'definition_id', 'package_id')->withTimestamps();
    }

    public function texts()
    {
        return $this->morphMany(Text::class, 'textable');
    }

    public function parentReservation()
    {
        return $this->morphMany(ReservationElement::class, 'parentable');
    }

    public function editors()
    {
        return $this->morphMany(UserEditableContent::class, 'editable');
    }

    public function backendLink() {
        return route('admin.categories.show', ['category' => $this]);
    }

    public function frontLink()
    {
        return url('category/'.$this->friendly);
    }
}
