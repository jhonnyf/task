<?php

namespace App\View\Components;

use App\Models\Checklist as ModelsChecklist;
use Illuminate\View\Component;

class Checklist extends Component
{
    public $checklist;

    public function __construct(ModelsChecklist $checklist)
    {
        $this->checklist = $checklist;
    }

    public function render()
    {
        return view('components.checklist');
    }
}
