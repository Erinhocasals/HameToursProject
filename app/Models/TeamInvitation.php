<?php

namespace App\Models;

use App\Traits\InvitesTeamMembers;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\TeamInvitation as JetstreamTeamInvitation;
use Str;

class TeamInvitation extends JetstreamTeamInvitation
{
    use Notifiable;
    use InvitesTeamMembers;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'email',
        'referral',
        'team_id',
        'role',
        'generic'
    ];

    /**
     * Get the team that the invitation belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Jetstream::teamModel());
    }

    public function generateReferralCode() {
        $this->referral = $this->referral ?: Str::random(40);
        $this->save();
    }

    // public function booted() {
    //     static::creating(function ($invitation) {
    //         $invitation->code = $invitation->code ?: Str::random(40);
    //         return $invitation;
    //     });
    // }
}
