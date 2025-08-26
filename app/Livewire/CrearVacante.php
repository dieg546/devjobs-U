<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CrearVacante extends Component
{   

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $descripcion;
    public $ultimo_dia;
    public $imagen;

    use WithFileUploads;

    protected $rules=[

        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' =>'required|image|max:1024',

    ];

    public function crearVacante(){

        $datos = $this->validate();

        //Almacenamos la imagen

        $imagen = $this->imagen->store('vacantes','public');

        $nombre_img = str_replace('vacantes/','',$imagen);


        // Crear Vacante

        Vacante::create([

            'titulo' => $this->titulo,
            'salario_id' => $this->salario,
            'categoria_id' => $this->categoria,
            'empresa' => $this->empresa,
            'ultimo_dia' => $this->ultimo_dia,
            'descripcion' => $this->descripcion,
            'imagen' => $nombre_img,
            'user_id' => Auth::user()->id,

        ]);

        //Crear Mensaje

        session()->flash('mensaje','La vacante se creo correctamente.');

        //Regresamos al Dashborad

        return redirect()->route('vacantes.index');

    }

    public function render()
    {   

        //Consultamos DB

        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.crear-vacante',[
            'salarios'=>$salarios,
            'categorias' => $categorias,
        ]);
    }
}
