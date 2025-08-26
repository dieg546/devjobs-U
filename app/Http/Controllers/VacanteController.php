<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        Gate::authorize('viewAny',Vacante::class);

        return view('vacantes.index');
        
        
        dd("Nada de nada 1");

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        Gate::authorize('create',Vacante::class);
        
        return view('vacantes.create');
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacante $vacante)
    {
        // 

        return view('vacantes.show',[
            'vacante'=>$vacante
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante)
    {
        //

        if(Gate::inspect('update',$vacante)->allowed()){

            return view('vacantes.edit',[
                'vacante' => $vacante,
            ]);

        }

        return back();

    }

}
