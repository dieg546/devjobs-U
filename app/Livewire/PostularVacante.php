<?php

namespace App\Livewire;

use App\Models\Candidato;
use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{   

    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules=[

        'cv' => 'required|mimes:pdf',

    ];

    public function mount(Vacante $vacante){

        $this->vacante = $vacante;

    }

    public function subirCurriculum(){

        $this->validate();

        $cv = $this->cv->store('cvs','public');
        $nombrePath = str_replace('cvs/','',$cv);

        Candidato::create([

            'user_id'=> Auth::user()->id,
            'vacante_id' => $this->vacante->id,
            'cv' => $nombrePath

        ]);

        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id,$this->vacante->titulo,Auth::user()->id));

        session()->flash('mensaje','Se envio correctamente tu informacion');
        return redirect()->back();

    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
