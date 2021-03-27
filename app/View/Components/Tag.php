<?php

namespace App\View\Components;

use App\Models\Tag as ModelsTag;
use Illuminate\View\Component;

class Tag extends Component
{
    public $tag;

    public function __construct(ModelsTag $tag)
    {
        $this->tag = $tag;
    }

   
    public function render()
    {
        return view('components.tag');
    }
}
