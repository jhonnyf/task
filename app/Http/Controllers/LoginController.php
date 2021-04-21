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

    public function register()
    {
        return view('login.register');
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->all();

        $original_password = $data['password'];
        $data['password']  = Hash::make($original_password);

        unset($data['password_confirmation']);

        User::create($data);

        $credentials = ['email' => $data['email'], 'password' => $original_password];

        Auth::logout();
        Auth::attempt($credentials, true);

        return redirect()->route('board.index');
    }
}
