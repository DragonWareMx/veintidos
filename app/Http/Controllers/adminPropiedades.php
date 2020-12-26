<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminPropiedades extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function agregar()
    {
        return view('admin.agregarPropiedad');
    }

    public function agregarPost(Request $request)
    {  
        dd($request->all()); 
        $request->validate([
            'fotos.*' => 'image | required',
            'titulo'=> 'max:255 | required',
            'tipo' => 'required',
            'owner' => 'required',
            'deal' => 'required',
            'precio' => 'required | numeric',
            'estatus' => 'required',
            'ciudad' => 'max:255',
            'colonia' => 'required | max:255',
            'calle' => 'max:255',
            'int' => 'max:10',
            'ext' => 'max:10',
            'estado' => 'max:255 | required',
            'municipio' => 'max:255 | required',
            'terreno' => 'numeric',
            'construccion' => 'numeric',
            'half' => 'numeric',
            'bañoC' => 'numeric',
            'salas' => 'numeric',
            'cocinas' => 'numeric',
            'integrales' => 'numeric',
            'comedores' => 'numeric',
            'cuartos' => 'numeric',
            'patio' => 'max:5',
            'pServicio' => 'max:5',
            'cServicio' => 'max:5',
            'estudios' => 'numeric',
            'cocheras' => 'numeric',
            'vigilancia' => 'max:5',
            'cisterna' => 'max:5',
            'patio' => 'max:5',
            'antiguedad' => 'numeric',
            'pisos' => 'numeric',
            'piso' => 'numeric',
            'elevador' => 'max:5',
            'oficina' => 'max:5',
            'acceso' => 'max:5',
            'descripcion' => 'max:700 | required',
            'info' => 'max:700'
        ]);
        return view('admin.agregarPropiedad');
    }
}