<?php

namespace App\Livewire;

use Livewire\Component;

class Father extends Component
{
    public $name = 'Santiago Aranda';

    public function redirigir()
    {
        return $this->redirect(route('prueba'), navigate: true);
    }

    public function render()
    {
        return view('livewire.father');
    }
}
