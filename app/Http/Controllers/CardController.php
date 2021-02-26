<?php

namespace App\Http\Controllers;

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
                'target' => '.cards'
            ],
        ];

        return response()->json($response);
    }
}
