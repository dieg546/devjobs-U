<?php

namespace App\Livewire;

use App\Models\Vacante;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class MostrarVacante extends Component
{
    public function render()
    {   

        $vacantes = Vacante::where('user_id',Auth::user()->id)->paginate(10);

        return view('livewire.mostrar-vacante',[
            'vacantes' => $vacantes
        ]);
    }

    // public function eliminar($id){

    //     // dd($id);

    //     $this->dispatch("mostrarAlerta",vacante:$id);

    // }

    #[On('eliminarVacante')]
    public function eliminarVacante(int $id){

        Vacante::findOrFail($id)->delete();

    }

}
