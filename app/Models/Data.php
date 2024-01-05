<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'data';

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
    protected $fillable = ['title', 'key', 'value', 'hame_phone', 'hame_email', 'hame_address', 'hame_schedule', 'maintenance', 'ref_earn_level1', 'ref_earn_level2', 'ref_earn_level3', 'time_mailman_to_deliver', 'time_client_to_confirm', 'time_remittances_priority_to_referrals'];


}
