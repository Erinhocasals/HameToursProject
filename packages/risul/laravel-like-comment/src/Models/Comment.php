<?php

namespace risul\LaravelLikeComment\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laravellikecomment_comments';

    /**
	 * Fillable array
     */
    protected $fillable = ['user_id', 'parent_id', 'item_id', 'comment'];

    public function childs() {
        return Comment::where('item_id', $this->item_id)->where('parent_id', '=', $this->id)->get();
    }
}
