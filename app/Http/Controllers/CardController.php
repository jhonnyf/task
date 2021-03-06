<?php

namespace App\Http\Controllers;

use App\Models\Card as Model;
use App\Models\Checklist;
use App\Models\Column;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function store(int $column_id, Request $request)
    {
        $Column = Column::find($column_id);

        $responseCard = $Column->cards()->create([
            'card' => $request->card,
            'sort' => $Column->cards->count() + 1,
        ]);

        $response = [
            'error'   => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result'  => [
                'html'   => view('components.card', ['card' => $responseCard])->render(),
                'method' => 'append',
                'target' => ".column-{$responseCard->column_id} .cards",
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
            'error'   => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result'  => [],
        ];

        return response()->json($response);
    }

    public function detail(int $card_id)
    {
        $data = [
            'Card' => Model::find($card_id),
        ];

        $response = [
            'error'   => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result'  => [
                'html' => view('card.modal.detail', $data)->render(),
            ],
        ];

        return response()->json($response);
    }

    public function update(int $card_id, Request $request)
    {
        $Card = Model::find($card_id);

        if (isset($request->element)) {
            $element = $request->element;

            if ($element == 'card') {
                $Card->card = $request->value;
            } else if ($element == 'final_date') {
                $Card->final_date = str_replace('T', ' ', $request->value);
            } else {
                $Card->$element = $request->value;
            }
        }

        $Card->save();

        $response = [
            'error'   => false,
            'message' => '',
            'result'  => [],
        ];

        return response()->json($response);
    }

    public function generateChecklist(int $card_id)
    {
        $Card = Model::find($card_id);

        $responseChecklist = $Card->checklists()->create(['checklist' => 'Digite aqui o titulo da sua checklist']);

        $response = [
            'error'   => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result'  => [
                'html' => $responseChecklist,
            ],
        ];

        return response()->json($response);
    }
    
    public function generateChecklistItem(int $checklist_id)
    {
        $Checklist = Checklist::find($checklist_id);

        $responseChecklistItem = $Checklist->items()->create(['checklist_item' => 'Digite aqui o titulo da sua checklist']);

        $response = [
            'error'   => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result'  => [
                'html' => $responseChecklistItem,
            ],
        ];

        return response()->json($response);
    }
}
