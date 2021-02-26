<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class ColumnController extends Controller
{

    public function store(int $board_id, Request $request)
    {
        $Board = Board::find($board_id);

        $Board->cards()->create(['card' => $request->column]);

        $response = [
            'error'   => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result'  => [],
        ];

        return response()->json($response);
    }
}
