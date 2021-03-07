<?php

namespace App\View\Components;

use App\Models\ChecklistsItem;
use Illuminate\View\Component;

class ChecklistItem extends Component
{
    public $checklistItem;
 
    public function __construct(ChecklistsItem $checklistItem)
    {
        $this->checklistItem = $checklistItem;
    }


    public function render()
    {
        return view('components.checklist-item');
    }
}
