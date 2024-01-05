<?php

namespace App\Models;

use App\Http\Tools\Tools;
use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'intros';

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
    protected $fillable = ['title', 'subtitle', 'content', 'enabled', 'introable_id', 'introable_type', 'big_image', 'small_image'];

    /**
     * Get the parent introable model
     */
    public function introable()
    {
        return $this->morphTo();
    }

    public function deleteIntro() {
        if ($this->big_image)
            Tools::tryToDeleteFile($this->big_image);

        if ($this->small_image)
            Tools::tryToDeleteFile($this->small_image);

        $this->delete();
    }
}
