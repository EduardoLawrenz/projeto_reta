<?php

namespace App\View\Components\Auth;

use Illuminate\View\Component;
use Illuminate\View\View;

class Card extends Component
{
    public function render(): View|string
    {
        return view('components.auth.card');
    }
}