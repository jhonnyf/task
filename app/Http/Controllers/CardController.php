<?php

namespace App\Http\Controllers;

use App\Models\Card as Model;
use App\Models\Column;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function store(int $column_id, Request $request)
    {
        $Column = Column::find($column_id);

        $responseCard = $Column->cards()->create(['card' => $request->card]);

        $response = [
            'error'   => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result'  => [
                'html'   => view('components.card', ['card' => $responseCard])->render(),
                'method' => 'append',
                'target' => ".column-{$responseCard->column_id} .cards"
            ],
        ];

        return response()->json($response);
    }

    public function sort(int $column_id, Request $request)
    {
        if ($request->sort) {
            foreach ($request->sort as $sort => $card_id) {
                Model::where(['id' => $card_id])->update(['sort' => $sort, 'column_id' => $column_id]);
            }
        }

        $response = [
            'error' => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result' => []
        ];

        return response()->json($response);
    }
}
