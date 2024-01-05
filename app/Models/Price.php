<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Khsing\World\World;

class Price extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prices';

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
    protected $fillable = ['top_line', 'price', 'bottom_line', 'enabled', 'show_in_listing', 'country_code', 'priceable_id', 'priceable_type', 'date_start', 'date_end', 'supplier', 'cost', 'title'];

    /**
     * Get the parent imageable model
     */
    public function priceable()
    {
        return $this->morphTo();
    }

    public function reservationElements()
    {
        return $this->hasMany(ReservationElement::class);
    }

    public function countryOrContinent()
    {
        if ($this->country_code == "")
            return null;

        $flag = str_replace("wc-", "", $this->country_code);

        if ($flag != $this->country_code)
            return World::getContinentByCode(str_replace("wc-", "", $this->country_code));
        else
            return World::getByCode($this->country_code);
    }

}
