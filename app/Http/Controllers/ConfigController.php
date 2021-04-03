<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigSave;
use App\Models\User;
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
        $data = [];

        return view('config.team', $data);
    }
}
