<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterCategory extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'filter_categories';

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
    protected $fillable = ['title', 'subtitle', 'enabled'];

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_filter_categories', 'filter_category_id', 'category_id');
    }

    public function filters()
    {
        return $this->hasMany(Filter::class, 'category_id');
    }

    public function editors()
    {
        return $this->morphMany(UserEditableContent::class, 'editable');
    }

    public function backendLink() {
        return route('admin.filter-categories.show', ['filter_category' => $this]);
    }
}
