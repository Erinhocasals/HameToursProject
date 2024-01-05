<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use risul\LaravelLikeComment\Controllers\CommentController;
use risul\LaravelLikeComment\Models\Comment;

class Blog extends Model
{
    use Sluggable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blogs';

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
    protected $fillable = ['title', 'summary', 'content', 'enabled', 'friendly', 'author'];

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

    public function comments($parent_id = 0) {
        return Comment::where('item_id', '=', 'blog-' . $this->id)
                        ->where('parent_id', '=', $parent_id)->get(); // CommentController::getComments("blog-" . $this->id);
    }

    public function backendLink() {
        return route('admin.blog.show', ['blog' => $this]);
    }
}
