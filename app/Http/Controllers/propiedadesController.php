<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Propertie;
use App\C_Proposal;

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
        try{
            $decryptedId = Crypt::decrypt($id);
        }
        catch(\Exception $e){
            abort(404);
        }

        $propiedad=Propertie::find($decryptedId);

        $propiedades=Propertie::get();

        return view('Propiedades.propiedad',['propiedad'=>$propiedad, 'propiedades'=>$propiedades]);
    }

    public function propuesta(Request $request, $id){
        $decryptedId = Crypt::decrypt($id);
        //Validacion backend
        $request->validate([
            'nombre' => 'required|max:255|regex:/[a-zA-Z áéíóúÁÉÍÓÚ]+$/',
            'correo' => 'email|max:320',
            'telefono' => 'required|alpha_num|max:50|min:10',
            'comentario' => 'nullable|max:255|regex:/[a-zA-Z áéíóúÁÉÍÓÚ\,\.]+$/'
        ]);

        try {
            \DB::beginTransaction();

            $proposal = new C_Proposal;

            $proposal->name = $request->nombre;
            $proposal->email = $request->correo;
            $proposal->phone_number = $request->telefono;
            $proposal->comment = $request->comentario;

            //encuentra la propiedad
            $propertieP = Propertie::findOrFail($decryptedId);
            
            $proposal->propertie_id = $propertieP->id;

            $proposal->save();

            \DB::commit();

            return redirect('propiedad/'.$id)->with('status', '¡Solicitud enviada!');
         }catch(\Exception $e){
            \DB::rollback();
            return redirect('propiedad/'.$id)
                        ->withErrors(['No se pudo mandar la solicitud, intentelo más tarde.'])
                        ->withInput();
         }
    }
}
