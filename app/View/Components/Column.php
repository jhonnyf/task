<?php

namespace App\View\Components;

use App\Models\Column as ModelsColumn;
use Illuminate\View\Component;

class Column extends Component
{
    public $column;

    public function __construct(ModelsColumn $column)
    {
        $this->column = $column;
    }

    public function render()
    {
        return view('components.column');
    }
}
