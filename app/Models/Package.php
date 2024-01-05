<?php

namespace App\Models;

use App\Http\Controllers\Admin\PackageController;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use Sluggable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'packages';

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
    protected $fillable = ['title', 'subtitle', 'summary', 'content', 'enabled', 'starred', 'friendly', 'characteristics', 'includes'];

    public function sluggable()
    {
        return [
            'friendly' => [
                'source' => 'title'
            ]
        ];
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function showcase() {
        return $this->morphOne(Showcase::class, 'showcaseable');
    }

    public function reservation()
    {
        return $this->morphMany(ReservationElement::class, 'elementable');
    }

    public function parentReservation()
    {
        return $this->morphMany(ReservationElement::class, 'parentable');
    }

    public function texts()
    {
        return $this->morphMany(Text::class, 'textable');
    }

    public function enabledTexts() {
        return $this->texts()->where('enabled', '=', true)->get();
    }

    public function prices()
    {
        return $this->morphMany(Price::class, 'priceable');
    }

    public function defaultPrice() {
        return $this->prices->where('country_code', '=', null)->first();
    }

    public function entities() {
        return $this->belongsToMany(Entity::class, 'entity_packages', 'package_id', 'entity_id')
                    ->using(EntityPackage::class)
                    ->withPivot('id', 'time', 'time_definition')
                    ->withTimestamps();
    }

    public function definitions() {
        return $this->belongsToMany(Category::class, 'definition_package', 'package_id', 'definition_id')->withTimestamps();
    }

    public function times()
    {
        return $this->hasMany(PackageTime::class);
    }

    public function contents() {
        return $this->hasManyThrough(PackageContent::class, PackageTime::class, 'package_id', 'time_id', 'id', 'id');
    }

    public function similarPackages() {
        $localDefinitions = $this->definitions()->pluck('definition_id');

        return Package::where('enabled', '=', true)->where('id', '!=', $this->id)->whereHas('definitions', function($q) use($localDefinitions) {
            $q->whereIn('definition_id', $localDefinitions);
        })->get();
    }

    public function editors()
    {
        return $this->morphMany(UserEditableContent::class, 'editable');
    }

    public function shares()
    {
        return $this->morphMany(UserShareContent::class, 'shareable');
    }

    public function backendLink() {
        return route('admin.package.show', ['package' => $this]);
    }

    public function frontLink() {
        return route('front.package', ['friendly' => $this->friendly]);
    }
}
