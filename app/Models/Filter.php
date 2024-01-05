<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory, Sluggable;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'friendly', 'category_id', 'enabled'];

    public function sluggable()
    {
        return [
            'friendly' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(FilterCategory::class);
    }

    public function entities() {
        return $this->belongsToMany(Entity::class, 'entity_filters', 'filter_id', 'entity_id')->withTimestamps();
    }

    public function editors()
    {
        return $this->morphMany(UserEditableContent::class, 'editable');
    }

    public function backendLink() {
        return route('admin.filters.show', ['filter' => $this]);
    }
}
