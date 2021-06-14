<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index(Request $request)
    {
        return view('login.index');
    }

    public function authenticate(Login $request)
    {
        if (Auth::attempt($request->only(['email', 'password']), true) === false) {
            return redirect()->route('login.index');
        }

        return redirect()->route('board.index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.index');
    }

    public function register(int $team_id = null, Request $request)
    {
        $data = [
            'email'   => $request->email,
            'team_id' => $team_id,
        ];

        return view('login.register', $data);
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->all();

        $original_password = $data['password'];
        $team_id           = isset($data['team_id']) ? $data['team_id'] : null;

        $data['password'] = Hash::make($original_password);

        unset($data['password_confirmation']);
        unset($data['team_id']);

        $responseUser = User::create($data);
        if ($team_id > 0) {
            $User = User::find($responseUser['id']);
            $User->teams()->attach($team_id, ['responsibility_id' => 2]);
        }

        $credentials = ['email' => $data['email'], 'password' => $original_password];

        Auth::logout();
        Auth::attempt($credentials, true);

        return redirect()->route('board.index');
    }
}
