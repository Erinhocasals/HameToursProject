<?php

namespace App\Models;

use App\Http\Tools\Tools;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use Sluggable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'entities';

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
    protected $fillable = ['title', 'summary', 'content', 'latitude', 'longitude', 'friendly', 'category_id', 'enabled', 'characteristics', 'definition_id', 'date_start', 'date_end', 'reservation_message', 'bank_interaction', 'bank_currency', 'bank_delivery_amount', 'supplier', 'cost'];

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

    public function category()
    {
        return $this->belongsTo(EntityCategory::class);
    }

    public function definitions() {
        return $this->belongsToMany(Category::class, 'entity_definitions', 'entity_id', 'definition_id')->withTimestamps();
    }

    public function prices()
    {
        return $this->morphMany(Price::class, 'priceable');
    }

    public function defaultPrice($dateStart = null, $dateEnd = null) {
        //return $this->prices->where('country_code', '=', null)
        return Price::where('priceable_id', '=', $this->id)->where('priceable_type', '=', get_class($this))
        ->where('enabled', '=', true)
        // ->whereDate('date_start', '<=', Carbon::now())
        // ->whereDate('date_end', '>=', Carbon::now())
        ->whereDate('date_start', '<=', $dateStart)
        ->whereDate('date_end', '>=', $dateEnd)
        ->first();
    }

    public function experiences() {
        return $this->belongsToMany(Experience::class, 'entity_experiences', 'entity_id', 'experience_id');
    }

    public function filters() {
        return $this->belongsToMany(Filter::class, 'entity_filters', 'entity_id', 'filter_id')->withTimestamps();
    }

    public function packages() {
        return $this->belongsToMany(Category::class, 'entity_packages', 'entity_id', 'package_id')
                    ->using(EntityPackage::class)
                    ->withPivot('id', 'time', 'time_definition')
                    ->withTimestamps();
    }

    public function texts()
    {
        return $this->morphMany(Text::class, 'textable');
    }

    public function editors()
    {
        return $this->morphMany(UserEditableContent::class, 'editable');
    }

    public function shares()
    {
        return $this->morphMany(UserShareContent::class, 'shareable');
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'logable');
    }

    public function backendLink() {
        return route('admin.entities.show', ['entity' => $this]);
    }

    public function frontLink() {
        return $this->friendly ? route('front.entity', ['friendly' => $this->friendly]) : "";
    }

    public function currencyToString() {
        return Tools::currencyToString($this->bank_currency);
    }

}
