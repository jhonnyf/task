<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Checklist as Model;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{

    public function store(int $card_id)
    {
        $Card = Card::find($card_id);

        $responseChecklist = $Card->checklists()->create(['checklist' => 'Digite aqui o titulo da sua checklist']);

        $response = [
            'error'   => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result'  => [
                'html' => view('components.checklist', ['checklist' => Model::find($responseChecklist->id)])->render(),
            ],
        ];

        return response()->json($response);
    }

    public function update(int $checklist_id, Request $request)
    {
        $Checklist = Model::find($checklist_id);

        if (isset($request->element)) {
            $element = $request->element;

            $Checklist->$element = $request->value;
        }

        $Checklist->save();

        $response = [
            'error'   => false,
            'message' => '',
            'result'  => [],
        ];

        return response()->json($response);
    }

    public function destroy(int $checklist_id)
    {
        $Checklist = Model::find($checklist_id);

        $Checklist->active = 2;
        $Checklist->save();

        $response = [
            'error'   => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result'  => [],
        ];

        return response()->json($response);
    }
}
