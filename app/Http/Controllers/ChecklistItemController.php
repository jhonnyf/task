<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\ChecklistsItem as Model;
use Illuminate\Http\Request;

class ChecklistItemController extends Controller
{

    public function store(int $checklist_id)
    {
        $Checklist = Checklist::find($checklist_id);

        $responseChecklistItem = $Checklist->items()->create(['checklist_item' => 'Digite aqui uma tarefa!']);

        $response = [
            'error'   => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result'  => [
                'html' => view('components.checklist-item', ['checklistItem' => Model::find($responseChecklistItem->id)])->render(),
            ],
        ];

        return response()->json($response);
    }

    public function update(int $checklist_item_id, Request $request)
    {
        $Checklist = Model::find($checklist_item_id);

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

    public function destroy(int $checklist_item_id)
    {
        $Checklist = Model::find($checklist_item_id);

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
