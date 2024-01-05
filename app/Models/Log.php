<?php

namespace App\Models;

use App\Http\Tools\Tools;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationRemittanceMail;
use Exception;

class Log extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'logs';

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
    protected $fillable = ['title', 'logable_id', 'logable_type', 'user_id'];

    public function logable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function identity() {
        return substr( str_replace('App\\Models\\', '', $this->logable_type), 0, 1 );
    }

    public static function boot() {

	    parent::boot();

	    static::created(function($item) {
            if ($item->logable_type == 'App\\Models\\Reservation') {
                try {
                    // $emails = ['erinhocasals@gmail.com', 'alejandro@hametour.com', 'jlmorales080@gmail.com'];
                    $emails = ['jlmorales080@gmail.com'];

                    foreach ($item->elements as $elem) {
                        if ($elem->parentable_type == 'App\\Models\\Category') {
                            if ($elem->parentable->type == 3) {
                                foreach ($elem->parentable->editors as $editor) {
                                    $user = $editor->user;
                                    $emails[] = $user->email;
                                }
                            }
                        }
                    }

                    $admins = User::whereHas("roles", function ($q) {
                        $q->where("name", "admin");
                    })->get();

                    foreach ($admins as $u) {
                        $emails[] = $u->email;
                    }

                    $emails = array_unique($emails);

                    $template = Template::where("friendly", "=", "titulo-de-confirmacion-al-recibir-nuevas-reservaciones")->first();
                    $subjet = $template ? $template->name : "Aviso de auditoría sobre reservaciones";

                    Mail::to($emails)->send(new ReservationRemittanceMail([
                        "subject" => $subjet,
                        "user" => $item->user,
                        "template" => [
                            'title' => $subjet,
                            'content' => $item->title,
                            'action_title' => 'Ver detalles',
                            'action_url' => route('admin.log.show', ['log' => $item->id])
                        ]
                    ]));

                    Tools::send_whatsapp('+5353442331', '450771', $item->title . ' (' . route('admin.log.show', ['log' => $item->id]) . ')');
                    Tools::send_whatsapp('+5352529974', '573416', $item->title . ' (' . route('admin.log.show', ['log' => $item->id]) . ')');
                }
                catch(Exception $ex) {}
            }
	    });

	    static::creating(function($item) {
	        FacadesLog:info('Item Creating Event:'.$item);
	    });

	}

}
