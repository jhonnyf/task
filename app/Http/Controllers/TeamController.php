<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessTeamInvitation;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function team()
    {
        $data = [
            'User' => User::find(Auth::user()->id),
        ];

        return view('config.team', $data);
    }

    public function manager(int $id = null, Request $request)
    {
        $data = [
            'id'   => $id,
            'Team' => Team::find($id),
        ];

        return view('config.team-manager', $data);
    }

    public function store(int $id = null, Request $request)
    {
        if (is_null($id)) {
            $responseTeam = Team::create($request->all());

            $User = User::find(Auth::user()->id);
            $User->teams()->attach($responseTeam, ['responsibility_id' => 1]);
        } else {
            $Team = Team::find($id);

            $Team->fill($request->all());
            $Team->save();

            $responseTeam = $Team;
        }

        $response = [
            'error'   => false,
            'message' => 'Ação realizada com sucesso',
            'result'  => $responseTeam,
        ];

        $response['result']['method'] = 'redirect';
        $response['result']['url']    = route('config.team-manager', ['id' => $responseTeam['id']]);

        return response()->json($response);
    }

    public function invitation(int $id, Request $request)
    {
        $checkEmail = User::where('email', $request->email)->exists();
        if ($checkEmail === false) {
            ProcessTeamInvitation::dispatch($request->email, $id);
        } else {

            $User = User::where('email', $request->email)->first();
            if ($User->teams()->where('team_id', $id)->exists() === false) {
                $User->teams()->attach($id, ['responsibility_id' => 2]);
            }
        }

        $response = [
            'error'   => false,
            'message' => 'Ação realizada com sucesso',
            'result'  => [],
        ];

        return response()->json($response);
    }

    public function acceptInvitation(int $team_id, Request $request)
    {
        $checkEmail = User::where('email', $request->email)->exists();
        if ($checkEmail === false) {
            return redirect()->route('login.register', ['team_id' => $team_id, 'email' => $request->email]);
        }
    }

    public function removeUser(int $id, int $user_id)
    {
        $User = User::find($user_id);
        $User->teams()->detach($id);

        return redirect()->route('config.team-manager', ['id' => $id]);
    }
}
