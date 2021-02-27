<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class ColumnController extends Controller
{

    public function store(int $board_id, Request $request)
    {
        $Board = Board::find($board_id);

        $responseColumn = $Board->columns()->create(['column' => $request->column]);

        $response = [
            'error'   => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result'  => [
                'html'   => view('components.column', ['column' => $responseColumn])->render(),
                'method' => 'append',
                'target' => ".columns .columns-board",
            ],
        ];

        return response()->json($response);
    }
}
