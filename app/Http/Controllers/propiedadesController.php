<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propertie;

class propiedadesController extends Controller
{
    public function ver(){
        $propiedades=Propertie::get();
        return view('Propiedades.propiedades',['propiedades'=>$propiedades]);
    }
}
