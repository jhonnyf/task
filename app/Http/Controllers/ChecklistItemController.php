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
                'html'       => view('components.checklist-item', ['checklistItem' => Model::find($responseChecklistItem->id)])->render(),
                'totalItems' => "({$Checklist->items()->where('finished', 1)->count()}/{$Checklist->items()->count()})",
            ],
        ];

        return response()->json($response);
    }

    public function update(int $checklist_item_id, Request $request)
    {
        $ChecklistItem = Model::find($checklist_item_id);

        if (isset($request->element)) {
            $element = $request->element;

            $ChecklistItem->$element = $request->value;
        }

        $ChecklistItem->save();

        $CheckList = Checklist::find($ChecklistItem->checklist_id);

        $response = [
            'error'   => false,
            'message' => '',
            'result'  => [
                'totalItems' => "({$CheckList->items()->where('finished', 1)->count()}/{$CheckList->items()->count()})",
            ],
        ];

        return response()->json($response);
    }

    public function destroy(int $checklist_item_id)
    {
        $ChecklistItem = Model::find($checklist_item_id);

        $ChecklistItem->active = 2;
        $ChecklistItem->save();

        $CheckList = Checklist::find($ChecklistItem->checklist_id);

        $response = [
            'error'   => false,
            'message' => view('components.message', ['message' => 'Ação realizada com sucesso!', 'error' => false])->render(),
            'result'  => [
                'totalItems' => "({$CheckList->items()->where('finished', 1)->count()}/{$CheckList->items()->count()})",
            ],
        ];

        return response()->json($response);
    }
}
