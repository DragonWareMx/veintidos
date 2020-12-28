<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propertie;
use App\Photo;
use App\House;
use App\Department;
use App\Terrain;
use App\Premises_Office;
use App\Wharehouse;

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
            'info' => 'max:700',
        ]);
        $propiedad = new Propertie();
        $propiedad->owner_name=$request->owner;
        $propiedad->description=$request->descripcion;
        if(isset($request->calle)){$propiedad->street=$request->calle;}
        if(isset($request->int)){$propiedad->int_number=$request->int;}
        if(isset($request->ext)){$propiedad->ext_number=$request->ext;}
        $propiedad->suburb=$request->colonia;
        $propiedad->town=$request->municipio;
        if(isset($request->ciudad)){$propiedad->city=$request->ciudad;}
        $propiedad->state=$request->estado;
        $propiedad->title=$request->titulo;
        $propiedad->deal=$request->deal;
        $propiedad->price=$request->precio;
        $propiedad->status=$request->estatus;
        $name = $request->fotos['0']->getClientOriginalName();
        $name = pathinfo( $name,PATHINFO_FILENAME);
        $extension = $request->fotos['0']->getClientOriginalExtension();
        $name=$name.'_'.time().'.'.$extension;
        $path = $request->fotos['0']->storeAs('/public/img/photos',$name);
        $propiedad->photo=$name;
        $propiedad->save();
        $aux=0;
        foreach($request->fotos as $foto){
            if($aux==0){
                $aux++;
                continue;
            }
            $name = $foto->getClientOriginalName();
            $name = pathinfo( $name,PATHINFO_FILENAME);
            $extension = $foto->getClientOriginalExtension();
            $name=$name.'_'.time().'.'.$extension;
            $path = $foto->storeAs('/public/img/photos',$name);
            $image=new Photo();
            $image->path=$name;
            $image->propertie_id=$propiedad->id;
            $image->save();
        }
        $tipo=$request->tipo;
        if($tipo=="casa"){
            $casa= new House();
            $casa->propertie_id=$propiedad->id;
            $casa->living_rooms=$request->salas;
            $casa->kitchens=$request->cocinas;
            $casa->integral_kitchen=$request->integrales;
            $casa->dining_rooms=$request->comedores;
            $casa->half_bathrooms=$request->half;
            $casa->bathrooms=$request->bañoC;
            $casa->bedrooms=$request->cuartos;
            $casa->yard=$request->patio;
            $casa->service_yard=$request->pServicio;
            $casa->service_room=$request->cServicio;
            $casa->home_office=$request->estudios;
            $casa->garages=$request->cocheras;
            $casa->security_vigilance=$request->vigilancia;
            $casa->cistern=$request->cisterna;
            $casa->antiquity=$request->antiguedad;
            $casa->construction=$request->construccion;
            $casa->terrain=$request->terreno;
            $casa->floors=$request->pisos;
            $casa->save();
        }
        dd($propiedad->id);
        return view('admin.agregarPropiedad');
    }
}