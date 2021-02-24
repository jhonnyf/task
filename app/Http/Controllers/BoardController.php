<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{

    public function index()
    {
        return view('board.index');
    }

    public function create()
    {
        $data = [];

        $response = [
            'error'   => false,
            'message' => 'Ação realizada com sucesso!',
            'result'  => [
                'html' => view('board.modal.create', $data)->render(),
            ],
        ];

        return response()->json($response);
    }

    public function store(Request $request)
    {
        $User = User::find(Auth::user()->id);

        $responseBoard = $User->boards()->create(['board' => $request->board]);

        $response = [            
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!' , 'error' => false])->render(),
            'return'  => $responseBoard,
        ];

        return response()->json($response);
    }
}
