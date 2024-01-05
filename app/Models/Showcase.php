<?php

namespace App\Models;

use App\Http\Tools\Tools;
use Illuminate\Database\Eloquent\Model;

class Showcase extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'showcases';

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
    protected $fillable = ['title', 'subtitle', 'content', 'svg', 'enabled', 'showcaseable_id', 'showcaseable_type'];

    /**
     * Get the parent showcaseable model
     */
    public function showcaseable()
    {
        return $this->morphTo();
    }

    /**
     * Get all of the images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function backendLink() {
        return route('admin.showcases.show', ['showcase' => $this]);
    }

    public function deleteShowcase() {
        if ($this->svg) {
            Tools::tryToDeleteFile($this->svg);
        }

        foreach($this->images as $image) {
            $image->deleteImage(true);
        }

        $this->delete();
    }
}
