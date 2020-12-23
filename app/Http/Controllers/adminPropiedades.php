<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminPropiedades extends Controller
{
    public function agregar()
    {
        return view('admin.agregarPropiedad');
    }
}
