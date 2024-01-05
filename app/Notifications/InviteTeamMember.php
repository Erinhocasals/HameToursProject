<?php

namespace App\Notifications;

use App\Models\TeamInvitation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use Laravel\Jetstream\TeamInvitation as JetstreamTeamInvitation;

class InviteTeamMember extends Notification
{
    use Queueable;

    protected $exists = false;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($exists)
    {
        $this->exists = $exists;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $userName = $notifiable->team->owner->name;
        $teamName = $notifiable->team->name;
        //$teamInvitation = JetstreamTeamInvitation::create(['team_id' => $notifiable->team->id, 'email' => $notifiable->email, 'role' => 'client']);

        return (new MailMessage)
            ->subject(__('Team Invitation'))
            ->line($userName . " " . __('Wants to join to his/her team') . ": " . $teamName)
            ->line(__('You may accept this invitation by clicking the button below:'))
            //->action($this->exists ? __('Accept Invitation') : __('Create Account'), $this->exists ? URL::signedRoute('team-invitations.accept', ['invitation' => $teamInvitation]) : route('register', ['referral' => $notifiable->code]) )
            ->action($this->exists ? __('Accept Invitation') : __('Create Account'), $this->exists ? URL::signedRoute('team-invitations.accept', ['invitation' => $notifiable]) : route('register', ['referral' => $notifiable->referral]) )
            ->line(__('Looking forward to having you on the team!'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
