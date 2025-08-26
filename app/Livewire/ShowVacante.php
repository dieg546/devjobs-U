<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class ShowVacante extends Component
{   

    public $vacante;

    public function mount(Vacante $vacante){

        $this->vacante = $vacante;

    }

    public function render()
    {
        return view('livewire.show-vacante');
    }
}
