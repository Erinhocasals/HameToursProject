<?php

namespace App\Models;

use App\Http\Tools\Tools;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as InterventionImage;
use WebPConvert\WebPConvert;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'tag'
    ];

    /**
     * Get the parent imageable model
     */
    public function imageable()
    {
        return $this->morphTo();
    }

    /**
     * Uploads a polymorphic image
     */
    public function storeImage($file, $imageable_type, $imageable_id, $tag = null, $convertToWebP = true) {
        $slug = $file->store('uploads', 'public');
        $path = storage_path('app/public/');
        $webp = $slug . ".webp";

        if ($convertToWebP) {
            $options = [
                'alpha-quality' => 70
            ];
            WebPConvert::convert($path . $slug, $path . $webp, $options);
            Tools::tryToDeleteFile($slug);
        }

        $this->url = $convertToWebP ? $webp : $slug;
        $this->imageable_type = $imageable_type;
        $this->imageable_id = $imageable_id;
        $this->tag = $tag;

        $this->save();

        return $this;
    }

    public static function storeExternalImage($file, $convertToWebP = true) {
        $slug = $file->store('uploads', 'public');
        $path = storage_path('app/public/');
        $webp = $slug . ".webp";

        if ($convertToWebP) {
            $options = [
                'alpha-quality' => 70
            ];
            WebPConvert::convert($path . $slug, $path . $webp, $options);
            Tools::tryToDeleteFile($slug);
        }

        return $convertToWebP ? $webp : $slug;
    }

    /**
     * Deletes a polymorphic image
     */
    public function deleteImage($deleteEntity = null) {
        Tools::tryToDeleteFile($this->url);

        if (isset($deleteEntity) && $deleteEntity)
            $this->delete();
    }
}
