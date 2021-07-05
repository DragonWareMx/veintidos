<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propertie;

class indexController extends Controller
{
    public function index(Request $request){
        $propiedades=Propertie::where('status','available')->orderby('created_at','desc')->limit(10)->get();
        return view('test',['propiedades'=>$propiedades]);
    }
}
