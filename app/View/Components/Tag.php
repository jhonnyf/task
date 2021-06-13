<?php

namespace App\View\Components;

use App\Models\Card;
use App\Models\Tag as ModelsTag;
use Illuminate\View\Component;

class Tag extends Component
{
    public $tag, $card;

    public function __construct(ModelsTag $tag, Card $card)
    {
        $this->tag  = $tag;
        $this->card = $card;
    }

    public function render()
    {
        return view('components.tag');
    }
}
