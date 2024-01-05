<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntityCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'entity_categories';

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
    protected $fillable = ['title', 'subtitle', 'svg', 'content', 'enabled'];

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_entity_categories', 'entity_category_id', 'category_id');
    }

    public function entities()
    {
        return $this->hasMany(Entity::class, 'category_id');
    }

    public function enabledEntities(Category $definition)
    {
        return Entity::whereHas('definitions', function($q) use($definition) {
            $q->where('definition_id', $definition->id);
        })
        ->where('category_id', '=', $this->id)
        ->where('enabled', '=', true)
        ->get();
    }

    public function editors()
    {
        return $this->morphMany(UserEditableContent::class, 'editable');
    }

    public function backendLink() {
        return route('admin.entity-categories.show', ['entity_category' => $this]);
    }
}
