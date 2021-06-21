<?php

namespace App\View\Components;

use App\Models\Card;
use Illuminate\View\Component;

class CardUser extends Component
{

    public $card;

    public function __construct(Card $card)
    {
        $this->card = $card;
    }

    public function render()
    {
        return view('components.card-user');
    }
}
