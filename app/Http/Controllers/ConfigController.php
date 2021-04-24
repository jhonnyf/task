<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigSave;
use App\Jobs\ProcessTeamInvitation;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConfigController extends Controller
{
    public function index()
    {
        $data = [
            "User" => Auth::user(),
        ];

        return view('config.index', $data);
    }

    public function save(ConfigSave $request)
    {
        $User = User::find(Auth::user()->id);

        if (isset($request->password)) {
            $User->password = Hash::make($request->password);
        }

        $fill = $request->only(['first_name', 'last_name']);

        $User->fill($fill)->save();

        $request->session()->flash('success', 'Ação realizada com sucesso!');

        return redirect()->route('config.index');
    }

    public function team()
    {
        $data = [
            'User' => User::find(Auth::user()->id),
        ];

        return view('config.team', $data);
    }

    public function teamManager(int $id = null, Request $request)
    {
        $data = [
            'id'   => $id,
            'Team' => Team::find($id),
        ];

        return view('config.team-manager', $data);
    }

    public function teamStore(int $id = null, Request $request)
    {
        if (is_null($id)) {
            $responseTeam = Team::create($request->all());

            $User = User::find(Auth::user()->id);
            $User->teams()->attach($responseTeam);
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

    public function teamInvitation(int $id, Request $request)
    {
        $checkEmail = User::where('email', $request->email)->exists();
        if ($checkEmail === false) {
            ProcessTeamInvitation::dispatch($request->email, $id);
        } else {

            $User = User::where('email', $request->email)->first();
            $User->teams()->attach($id);
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

    public function teamRemoveUser(int $id, int $user_id)
    {
        $User = User::find($user_id);
        $User->teams()->detach($id);

        return redirect()->route('config.team-manager', ['id' => $id]);
    }
}
