<?php

namespace App\Models;

use App\Http\Tools\Tools;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transactions';

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
    protected $fillable = ['amount', 'currency', 'user_id', 'type', ''];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currencyToString() {
        return Tools::currencyToString($this->currency);
    }

}
