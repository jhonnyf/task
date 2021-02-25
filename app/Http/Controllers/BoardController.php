<?php

namespace App\Http\Controllers;

use App\Models\Board as Model;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{

    public function index()
    {
        $User = Auth::user();

        $data = [
            'boards' => $User->boards,
        ];

        return view('board.index', $data);
    }

    public function detail(int $id)
    {
        $data = [
            'id'    => $id,
            'Board' => Model::find($id),
        ];

        return view('board.detail', $data);
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
            'error'   => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result'  => [
                'method' => 'redirect',
                'url'    => route('board.detail', ['id' => $responseBoard->id]),
            ],
        ];

        return response()->json($response);
    }
}
