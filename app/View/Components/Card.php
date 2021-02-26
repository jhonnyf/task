<?php

namespace App\View\Components;

use App\Models\Card as ModelsCard;
use Illuminate\View\Component;

class Card extends Component
{

    public $card;

    public function __construct($card)
    {
        $this->card = $card;
    }

    public function render()
    {
        return view('components.card');
    }
}
