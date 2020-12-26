<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propertie;

class propiedadesController extends Controller
{
    public function ver(Request $request){
        if(!$request->all()){
            $propiedades=Propertie::get();
            return view('Propiedades.propiedades',['propiedades'=>$propiedades]);
        }
        else{
            $properties=[];
            $propiedades=Propertie::get();
            if(isset($request->deal)){
                foreach($propiedades as $propiedad){
                    if($propiedad->deal==$request->deal){
                        $properties[]=$propiedad;
                    }
                }
                $propiedades=$properties;
                $properties=[];
            }
            
            if(isset($request->tipo)){
                foreach($propiedades as $propiedad){
                    if (count($propiedad->house()->get())==1){
                        if($request->tipo == 'casas'){
                            $properties[]=$propiedad;
                        }
                    }
                    elseif (count($propiedad->department()->get())==1){
                        if($request->tipo == 'departamentos'){
                            $properties[]=$propiedad;
                        }
                    }
                    elseif (count($propiedad->terrain()->get())==1){
                        if($request->tipo == 'terrenos'){
                            $properties[]=$propiedad;
                        }
                    }
                    elseif (count($propiedad->warehouse()->get())==1){
                        if($request->tipo == 'bodegas'){
                            $properties[]=$propiedad;
                        }
                    }
                    elseif (count($propiedad->office()->get())==1){
                        if($request->tipo == 'oficinas' || $request->tipo=='locales'){
                            $properties[]=$propiedad;
                        }
                    }
                }
                $propiedades=$properties;
                $properties=[];
            }
            if(isset($request->precio)){
                $rango=explode(',',$request->precio);
                foreach ($propiedades as $propiedad){
                    if($propiedad->price >= $rango[0] && $propiedad->price <= $rango[1]){
                        $properties[]=$propiedad;
                    }
                }
                $propiedades=$properties;
                $properties=[];
            }
            if(isset($request->busqueda)){
                foreach ($propiedades as $propiedad){
                    if(stripos($propiedad->description,$request->busqueda) !== false){
                        $properties[]=$propiedad;
                    }
                }
                $propiedades=$properties;
                $properties=[];
            }
            return view('Propiedades.propiedades',['propiedades'=>$propiedades]);
        }
    }

    public function propiedad($id){
        $propiedad=Propertie::find($id);
        return view('Propiedades.propiedad',['propiedad'=>$propiedad]);
    }

    public function propuesta(Request $request, $id){
        dd($request);
    }
}
