<?php

namespace App\Http\Controllers;

use App\Mail\TeamInvitation;
use Illuminate\Http\Request;

class MailTemplateController extends Controller
{
    public function teamInvitation()
    {
        $response = new TeamInvitation('jhonnyf@live.com', 1);

        return $response;
    }
}
