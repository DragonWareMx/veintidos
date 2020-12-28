<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propertie;

class indexController extends Controller
{
    public function index(Request $request){
        $propiedades=Propertie::orderby('created_at','desc')->limit(20)->get();
        return view('test',['propiedades'=>$propiedades]);
    }
}
