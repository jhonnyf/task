<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeamInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $team_id;

    public function __construct(string $email, int $team_id)
    {
        $this->email   = $email;
        $this->team_id = $team_id;
    }

    public function build()
    {
        //['id' => $this->team_id, 'email' => $this->email]

        return $this->markdown('emails.teams.invitation', [
            'email'   => $this->email,
            'team_id' => $this->team_id,
        ])
            ->subject('Convite de time');
    }
}
