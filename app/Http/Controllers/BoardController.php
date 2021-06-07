<?php

namespace App\Http\Controllers;

use App\Models\Board as Model;
use App\Models\Team;
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
            'teams'  => $User->teams,
        ];

        return view('board.index', $data);
    }

    public function detail(int $id)
    {
        $data = [
            'id'    => $id,
            'Board' => Model::find($id),
        ];

        if (empty($data['Board'])) {
            return redirect()->route('board.index');
        }

        return view('board.detail', $data);
    }

    public function create(Request $request)
    {
        $data = [
            'team_id' => isset($request->team_id) ? $request->team_id : null,
        ];

        return view('board.modal.create', $data);
    }

    public function store(Request $request)
    {
        $User = User::find(Auth::user()->id);

        $responseBoard = $User->boards()->create(['board' => $request->board]);

        if (isset($request->team_id)) {
            $Team = Team::find($request->team_id);
            $Team->boards()->attach($responseBoard->id);
        }

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
