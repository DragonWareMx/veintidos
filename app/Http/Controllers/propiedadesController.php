<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Propertie;
use App\C_Proposal;
use Illuminate\Database\Eloquent\Builder;

class propiedadesController extends Controller
{
    public function ver(Request $request){
        //si no hay request se muestran todas las propiedades
        if(!$request->page && !$request->deal && !$request->tipo && !$request->precio && !$request->busqueda){
            $propiedades=Propertie::where('status','available')->paginate(15)->appends(request()->except('page'));
            return view('Propiedades.propiedades',['propiedades'=>$propiedades, 'tipo'=> 'TODO']);
        }
        //si no...
        else{
            //obtenemos todas las propiedades
            $properties=[];
            $propiedades=Propertie::where('status','available');
            $tipo = 'TODO';

            //si hay request del tipo deal se obtienen solo las propiedades que coinciden
            if(isset($request->deal)){
                /*foreach($propiedades as $propiedad){
                    if($propiedad->deal==$request->deal){
                        $properties[]=$propiedad;
                    }
                }
                $propiedades=$properties;
                $properties=[];
                */
                $propiedades = $propiedades->where('deal',$request->deal);
            }

            //si hay request del tipo tipo se obtienen solo las propiedades que coinciden
            if(isset($request->tipo)){
                /*foreach($propiedades as $propiedad){
                    if (count($propiedad->house()->get())==1){
                        if($request->tipo == 'casas'){
                            $properties[]=$propiedad;
                            $tipo = 'CASAS';
                        }
                    }
                    elseif (count($propiedad->department()->get())==1){
                        if($request->tipo == 'departamentos'){
                            $properties[]=$propiedad;
                            $tipo = 'DEPARTAMENTOS';
                        }
                    }
                    elseif (count($propiedad->terrain()->get())==1){
                        if($request->tipo == 'terrenos'){
                            $properties[]=$propiedad;
                            $tipo = 'TERRENOS';
                        }
                    }
                    elseif (count($propiedad->warehouse()->get())==1){
                        if($request->tipo == 'bodegas'){
                            $properties[]=$propiedad;
                            $tipo = 'BODEGAS';
                        }
                    }
                    elseif (count($propiedad->office()->get())==1){
                        if($request->tipo == 'oficinas'){
                            if($propiedad->office->type == 'office'){
                                $properties[]=$propiedad;
                                $tipo = 'OFICINAS';
                            }
                        }
                        else if($request->tipo=='locales'){
                            if($propiedad->office->type == 'premises'){
                                $properties[]=$propiedad;
                                $tipo = 'LOCALES';
                            }
                        }
                    }
                }
                $propiedades=$properties;
                $properties=[];
                */
                if($request->tipo == 'casas'){
                    $propiedades = $propiedades->whereHas('house');
                    $tipo = 'CASAS';
                }
                else if($request->tipo == 'departamentos'){
                        $propiedades = $propiedades->whereHas('department');
                        $tipo = 'DEPARTAMENTOS';
                    }
                else if($request->tipo == 'terrenos'){
                    $propiedades = $propiedades->whereHas('terrain');
                    $tipo = 'TERRENOS';
                }
                else if($request->tipo == 'bodegas'){
                    $propiedades = $propiedades->whereHas('warehouse');
                    $tipo = 'BODEGAS';
                }
                else if($request->tipo == 'oficinas'){
                    $propiedades = $propiedades->whereHas('office', function (Builder $query) {
                        $query->where('type', 'office');
                    });
                    $tipo = 'OFICINAS';
                }
                else if($request->tipo == 'locales'){
                    $propiedades = $propiedades->whereHas('office', function (Builder $query) {
                        $query->where('type', 'premises');
                    });
                    $tipo = 'LOCALES';
                }
            }

            //si hay request del tipo precio se obtienen solo las propiedades que coinciden
            if(isset($request->precio)){
                $rango=explode(',',$request->precio);
                /*foreach ($propiedades as $propiedad){
                    if($propiedad->price >= $rango[0] && $propiedad->price <= $rango[1]){
                        $properties[]=$propiedad;
                    }
                }
                $propiedades=$properties;
                $properties=[];*/
                $propiedades = $propiedades->where('price','>=',$rango[0])->where('price','<=',$rango[1]);
            }
            if(isset($request->busqueda)){
                /*foreach ($propiedades as $propiedad){
                    if(stripos($propiedad->description,$request->busqueda) !== false){
                        $properties[]=$propiedad;
                    }
                }
                $propiedades=$properties;
                $properties=[];*/

                $propiedades = $propiedades->where('description','like','%'.$request->busqueda.'%')
                                            ->orWhere('description','like','%'.$request->busqueda.'%');
            }

            $propiedades = $propiedades->paginate(15)->appends(request()->except('page'));

            return view('Propiedades.propiedades',['propiedades'=>$propiedades, 'tipo'=>$tipo]);
        }
    }

    public function propiedad($id){
        try{
            $decryptedId = Crypt::decrypt($id);
        }
        catch(\Exception $e){
            abort(404);
        }

        //encuentra la propiedad
        $propiedad=Propertie::find($decryptedId);

        //obtenemos las propiedades similares en base al tipo y ciudad
        $propiedades=Propertie::where('town', $propiedad->town)->where('id','!=',$propiedad->id);

        //obtenemos el tipo de la propiedad
        $tipo;

        if ($propiedad->house()->exists()){
            $tipo = 'CASA';
            $propiedades = $propiedades->whereHas('house')
                                        ->take(15)
                                        ->get();
        }
        else if ($propiedad->department()->exists()){
            $tipo = 'DEPARTAMENTO';
            $propiedades = $propiedades->whereHas('department')
                                        ->take(15)
                                        ->get();
        }
        else if ($propiedad->terrain()->exists()){
            $tipo = 'TERRENO';
            $propiedades = $propiedades->whereHas('terrain')
                                        ->take(15)
                                        ->get();
        }
        else if ($propiedad->warehouse()->exists()){
            $tipo = 'BODEGA';
            $propiedades = $propiedades->whereHas('warehouse')
                                        ->take(15)
                                        ->get();
        }
        else if ($propiedad->office()->exists()){
            if ($propiedad->office->type == 'office') {
                $tipo = 'OFICINA';
                $propiedades = $propiedades->whereHas('office', function (Builder $query) {
                                                $query->where('type', 'office');
                                            })
                                        ->take(15)
                                        ->get();
            }
            else {
                $tipo = 'LOCAL';
                $propiedades = $propiedades->whereHas('office', function (Builder $query) {
                                                $query->where('type', 'premises');
                                            })
                                        ->take(15)
                                        ->get();
            }
        }

        return view('Propiedades.propiedad',['propiedad'=>$propiedad, 'propiedades'=>$propiedades, 'tipo'=> $tipo]);
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
