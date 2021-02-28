<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Column as Model;
use Illuminate\Http\Request;

class ColumnController extends Controller
{

    public function store(int $board_id, Request $request)
    {
        $Board = Board::find($board_id);

        $responseColumn = $Board->columns()->create([
            'column' => $request->column,
            'sort'   => $Board->columns->count() + 1,
        ]);

        $response = [
            'error'   => false,
            'message' => '',
            'result'  => [
                'html'   => view('components.column', ['column' => $responseColumn])->render(),
                'method' => 'append',
                'target' => ".columns .columns-board",
            ],
        ];

        return response()->json($response);
    }

    public function sort(int $board_id, Request $request)
    {
        if ($request->sort) {
            foreach ($request->sort as $sort => $column_id) {
                Model::where(['id' => $column_id, 'board_id' => $board_id])->update(['sort' => $sort]);
            }
        }

        $response = [
            'error'   => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result'  => [],
        ];

        return response()->json($response);
    }

    public function update(int $colmn_id, Request $request)
    {
        $Column         = Model::find($colmn_id);
        $Column->column = $request->column;

        $Column->save();

        $response = [
            'error'   => false,
            'message' => '',
            'result'  => [],
        ];

        return response()->json($response);
    }

    public function destroy(int $column_id)
    {
        $Column = Model::find($column_id);
        
        $Column->active = 2;
        $Column->save();

        $response = [
            'error'   => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result'  => [
                'target' => ".column.column-{$column_id}",
                'method' => 'remove'
            ]
        ];

        return response()->json($response);
    }
}
