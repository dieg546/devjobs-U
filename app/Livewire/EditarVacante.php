<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{

    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $descripcion;
    public $ultimo_dia;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;


    public function mount(Vacante $vacante){

        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->descripcion = $vacante->descripcion;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->imagen = $vacante->imagen;

    }

    protected $rules=[

        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' =>'nullable|image|max:1024',

    ];

    public function editarVacante(){

        $this->validate();

        //Nueva imagen

        $nombreImagen=null;

        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('vacantes','public');
            $nombreImagen = str_replace('vacantes/','',$imagen);

        }

        //Encontrar la vacante

        $vacante = Vacante::find($this->vacante_id);

        //asignar valores 

        $vacante->titulo = $this->titulo;
        $vacante->salario_id = $this->salario;
        $vacante->categoria_id = $this->categoria;
        $vacante->empresa = $this->empresa;
        $vacante->ultimo_dia = $this->ultimo_dia;
        $vacante->descripcion = $this->descripcion;
        $vacante->imagen = $nombreImagen ?? $this->imagen;
        $vacante->user_id = Auth::user()->id;

        //Guardar vacantes

        $vacante->save();

        //redireccionar

        session()->flash('mensaje','La Vacante de modifico correctamente');

        return redirect()->route('vacantes.index');


    }

    public function render()
    {   

        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante',[
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
