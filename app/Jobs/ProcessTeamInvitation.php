<?php

namespace App\Jobs;

use App\Mail\TeamInvitation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessTeamInvitation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email;
    private $team_id;

    public function __construct(string $email, int $team_id)
    {
        $this->email   = $email;
        $this->team_id = $team_id;
    }

    public function handle()
    {
        Mail::to($this->email)
            ->send(new TeamInvitation($this->email, $this->team_id));
    }
}
