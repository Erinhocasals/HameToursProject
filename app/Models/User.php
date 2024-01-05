<?php

namespace App\Models;

use App\Http\Tools\Tools;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Return the user attributes.

     * @return array
     */
    public static function getAuthor($id)
    {
        $user = self::find($id);
        return [
            'id'     => $user->id,
            'name'   => $user->name,
            'email'  => $user->email,
            'url'    => '',  // Optional
            'avatar' => 'gravatar',  // Default avatar
            'admin'  => $user->role === 'admin', // bool
            'avatar' => $user->profile_photo_url
        ];
    }

    public function beneficiaries()
    {
        return $this->hasMany(Beneficiary::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class)->latest();
    }

    public function payedReservations() {
        return $this->reservations()->whereHas('status', function($q) {
            $q->where('status', '=', 7);
        })->get();
    }

    public function openReservation() {
        return $this->reservations()->whereHas('status', function($q) {
            $q->where('status', '=', 0);
        })->first();
    }

    public function agencyReservations() {
        return Reservation::whereHas('elements', function($q) {
            $q->whereHasMorph('elementable', [Entity::class, Package::class], function($p) {
                //$p->where('title', '=', 'mi producto');
                $p->whereHas('editors', function($e) {
                    $e->where('user_id', '=', auth()->user()->id);
                });
            });
        });
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function ownedEditableContents() {
        return $this->hasMany(UserEditableContent::class);
    }

    public function ownedDefinitions() {
        $categories = array();
        $intermediaries = $this->ownedEditableContents->where('editable_type', '=', 'App\\Models\\Category');
        foreach($intermediaries as $item) {
            $categories[] = $item->editable;
        }
        return $categories;
    }

    public function ownedEntityCategories() {
        $categories = array();
        $intermediaries = $this->ownedEditableContents->where('editable_type', '=', 'App\\Models\\EntityCategory');
        foreach($intermediaries as $item) {
            $categories[] = $item->editable;
        }
        return $categories;
    }

    public function ownedEntities() {
        //$entities = array();
        $intermediaries = $this->ownedEditableContents->where('editable_type', '=', 'App\\Models\\Entity');
        return $intermediaries;
        // foreach($intermediaries as $item) {
        //     $entities[] = $item->editable;
        // }
        // return $entities;
    }

    public function ownedPackages() {
        $packages = array();
        $intermediaries = $this->ownedEditableContents->where('editable_type', '=', 'App\\Models\\Package');
        foreach($intermediaries as $item) {
            $packages[] = $item->editable;
        }
        return $packages;
    }

    public function ownedFilterCategories() {
        $categories = array();
        $intermediaries = $this->ownedEditableContents->where('editable_type', '=', 'App\\Models\\FilterCategory');
        foreach($intermediaries as $item) {
            $categories[] = $item->editable;
        }
        return $categories;
    }

    public function shareableContents() {
        return $this->hasMany(UserShareContent::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class)->latest();
    }

    public function kyc()
    {
        return $this->hasOne(KYC::class);
    }

    public function deposits($currency) {
        return $this->transactions->where('currency', '=', $currency)->sum(function ($tx) {
            if ($tx->type == 'in') {
                return $tx->amount;
            }
            else {
                return -$tx->amount;
            }
        });
    }

    public function balance() {
        $txs = $this->transactions->groupBy('currency');

        $response = array();

        foreach($txs as $key => $value) {
            $sum =  $value->sum(function ($s) {
                return $s->type == 'in' ? $s->amount : -($s->amount);
            });

            $elem['key'] = $key;
            $elem['value'] = $sum;
            $elem['currency_string'] = Tools::currencyToString($key);

            $response[] = $elem;
        }

        return $response;
    }

    public function remittances() {
        $data = Data::where('key', '=', 'global')->first();

        // $results = [];
        $results = collect([]);

        if (auth()->user()->hasRole('bank')) {
            $elements = ReservationElement::whereHas('reservation', function($r) {
                $r->whereHas('status', function($s) {
                    //$s->whereNotIn('status', [0,2,3]);
                    $s->whereIn('status', [7]); // cobrada
                });
            })
            ->whereHas('elementable', function($e) {
                $e->where('bank_interaction', '=', true);
            })
            ->whereHas('beneficiary', function($b) {
                // $b->whereHas('location', function($loc) {
                //     $loc->whereIn('id', auth()->user()->kyc->locations->pluck('id'));
                // });
            })
            ->whereNull('messenger_response_at')
            ->whereNotNull('price')
            //->where(DB::raw('price * quantity'), '<=', $balance)
            ->whereNull('bank_id')
            ->orWhere('bank_id', '=', auth()->user()->id)
            ->get();

            foreach ($elements as $elem) {
                $client = $elem->reservation->user;
                $deposit = $this->deposits($elem->elementable->bank_currency);

                if ($deposit > ($elem->elementable->bank_delivery_amount * $elem->quantity)) {
                    $modified = Carbon::parse($elem->reservation->updated_at);
                    $current = Carbon::now();
                    $diff = $current->diffInHours($modified, true);

                    if ($elem->elementable->bank_currency && in_array($elem->elementable->bank_currency, ['USD', 'EUR', 'CUP']) && $elem->beneficiary && $elem->beneficiary->location && auth()->user()->kyc) { //cash
                        if (auth()->user()->kyc->locations->contains($elem->beneficiary->location)) {
                            if ($data && $data->time_remittances_priority_to_referrals > 0 && $diff < $data->time_remittances_priority_to_referrals) {
                                if (auth()->user()->currentTeam != auth()->user()->ownedTeams->first() && auth()->user()->currentTeam->owner->id == $client->id) {
                                    $results->add($elem);
                                }
                            }
                            else {
                                $results->add($elem);
                            }
                        }
                    }
                    else { //transferencias
                        if ($data && $data->time_remittances_priority_to_referrals > 0 && $diff < $data->time_remittances_priority_to_referrals) {
                            if (auth()->user()->currentTeam != auth()->user()->ownedTeams->first() && auth()->user()->currentTeam->owner->id == $client->id) {
                                $results->add($elem);
                            }
                        }
                        else {
                            $results->add($elem);
                        }
                    }
                }
            }
        }

        if (auth()->user()->hasRole('messenger')) {
            $elements = ReservationElement::whereHas('reservation', function($r) {
                $r->whereHas('status', function($s) {
                    //$s->whereNotIn('status', [0,2,3]);
                    $s->whereIn('status', [7]);
                });
            })
            ->whereHas('elementable', function($e) {
                $e->where('bank_interaction', '=', true);
            })
            ->whereNotNull('price')
            ->whereNotNull('bank_id')
            ->whereNull('messenger_id')
            ->orWhere('messenger_id', '=', auth()->user()->id)
            ->get();

            foreach($elements as $elem) {
                if (!$results->contains('id', $elem->id) && (in_array($elem->elementable->bank_currency, ['USD', 'EUR', 'CUP'])) ) {
                    $results->add($elem);
                }
            }

            //$results = array_merge($results, $elements);
        }
        else {
            //return ReservationElement::where('bank_id', '=', -1)->get();
        }

        return $results->sortByDesc('updated_at');
    }

    public function getExpiredBankAttribute() {
        $settings = Data::where('key', '=', 'time')->firstOrFail();
        $end = Carbon::parse($this->taken_at);
        $end->addHours($settings->value);
        $current = Carbon::now();

        $diff = $current->diffInHours($end, false);
        return $diff;
    }

    public function expired() {
        $expired = ReservationElement::where('bank_id', '!=', null)->where(function ($t) {
            $settings = Data::where('key', '=', 'time')->firstOrFail();
            $end = Carbon::parse($t->taken_at);
            $end->addHours($settings->value);
            $current = Carbon::now();

            $diff = $current->diffInHours($end, false);
            return $diff > 10000000000;
        })/*->whereHas('elementable', function($e) {
            $e->where('bank_interaction', '=', true);
        })*/->get();

        return $expired;
    }

    private $tree;
    public function nestableTree($root = null, $level = 0) {
        $data = Data::where('key', '=', 'global')->first();

        if ($root == null) {
            $root = $this;
        }

        if ($root->currentTeam->id != $root->ownedTeams->first()->id && $root == $this) { // parent of root
            $this->tree .= '<li class="dd-item" data-id="' . $root->currentTeam->owner->id . '">' .
                    '<div class="dd-handle">' . $root->currentTeam->owner->name . '</div>';

            $this->tree .= '<ol class="dd-list">';

            $this->tree .= '<li class="dd-item" data-id="' . $root->id . '">' .
                    '<div class="dd-handle">' . $root->name . ' </div>';

            if ($root->ownedTeams->first()->users) {
                $this->tree .= '<ol class="dd-list">';
                foreach ($root->ownedTeams->first()->users as $ref) {
                    $this->nestableTree($ref, $level + 1);
                }
                $this->tree .= '</ol>';
            }

            $this->tree .= '</li>';

            $this->tree .= '</ol>';
        }
        else {
            $comission = "";
            $ref = 0;
            $earn = 0;

            if ($level == 1 && $data && $data->ref_earn_level1) {
                $comission = $data->ref_earn_level1 . "%";
                $ref = $data->ref_earn_level1;
            }
            elseif ($level == 2 && $data && $data->ref_earn_level2) {
                $comission = $data->ref_earn_level2 . "%";
                $ref = $data->ref_earn_level2;
            }
            elseif ($level == 3 && $data && $data->ref_earn_level3) {
                $comission = $data->ref_earn_level3 . "%";
                $ref = $data->ref_earn_level3;
            }

            if ($comission != "") {
                foreach ($root->payedReservations() as $res) {
                    $earn += $res->totalRealPrice() * ($ref / 100);
                }
            }

            $this->tree .= '<li class="dd-item" data-id="' . $root->id . '">' .
                '<div class="dd-handle">' . $root->name . '<span class="badge badge-sm light badge-warning ms-1">' . count($root->payedReservations()) . ' reservaciones</span> ' . ($comission != "" ? '<span class="badge badge-sm light badge-warning ms-1"> ' . $comission . ' </span>' : '') . ($comission != "" ? '<span class="badge badge-sm light badge-warning ms-1"> $' . $earn . ' </span>' : '') . ' </div>';

            if ($root->ownedTeams->first()->users) {
                $this->tree .= '<ol class="dd-list">';
                foreach ($root->ownedTeams->first()->users as $ref) {
                    $this->nestableTree($ref, $level + 1);
                }
                $this->tree .= '</ol>';
            }
        }


        $this->tree .= '</li>';
        return $this->tree;
    }

}
