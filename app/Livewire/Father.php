<?php

namespace App\Livewire;

use Livewire\Component;

class Father extends Component
{
    public $name = 'Santiago Aranda';

    public function render()
    {
        return view('livewire.father');
    }
}
