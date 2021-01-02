<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\QueryException;
use App\Propertie;
use App\Photo;
use App\House;
use App\Department;
use App\Terrain;
use App\Premises_Office;
use App\Warehouse;
use Illuminate\Support\Facades\DB;

class adminPropiedades extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function ver(Request $request){
        if($request->all() != null && !isset($request->page)){
            $propiedades=Propertie::get();
            $properties=[];
            if(isset($request->deal)){
                switch($request->deal){
                    case 'sale':
                        foreach($propiedades as $propiedad){
                            if($propiedad->deal=='sale'){
                                $properties[]=$propiedad;
                            }
                        }
                    break;
                    case 'rent':
                        foreach($propiedades as $propiedad){
                            if($propiedad->deal=='rent'){
                                $properties[]=$propiedad;
                            }
                        }
                    break;
                }
                $propiedades=$properties;
                $properties=[];
            }
            if(isset($request->tipo)){
                switch($request->tipo){
                    case 'casas':
                        foreach($propiedades as $propiedad){
                            if(count($propiedad->house()->get())==1){
                                $properties[]=$propiedad;
                            }
                        }
                    break;
                    case 'departamentos':
                        foreach($propiedades as $propiedad){
                            if(count($propiedad->department()->get())==1){
                                $properties[]=$propiedad;
                            }
                        }
                    break;
                    case 'locales':
                        foreach($propiedades as $propiedad){
                            if(count($propiedad->office()->get())==1){
                                if($propiedad->office->type == 'premises'){
                                    $properties[]=$propiedad;
                                }
                            }
                        }
                    break;
                    case 'oficinas':
                        foreach($propiedades as $propiedad){
                            if(count($propiedad->office()->get())==1){
                                if($propiedad->office->type == 'office'){
                                    $properties[]=$propiedad;
                                }
                            }
                        }
                    break;
                    case 'terrenos':
                        foreach($propiedades as $propiedad){
                            if(count($propiedad->terrain()->get())==1){
                                $properties[]=$propiedad;
                            }
                        }
                    break;
                    case 'bodegas':
                        foreach($propiedades as $propiedad){
                            if(count($propiedad->warehouse()->get())==1){
                                $properties[]=$propiedad;
                            }
                        }
                    break;
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
            $ids=[];
            foreach($propiedades as $propiedad){
                $ids[]=$propiedad->id;
            }
            $propiedades=Propertie::whereIn('id',$ids)->paginate(999999);
            return view('admin.propiedades',['propiedades'=>$propiedades]);
        }
        else{
            $propiedades=Propertie::paginate(15);
            return view('admin.propiedades',['propiedades'=>$propiedades]);
        }
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
        try{
            DB::transaction(function () use ($request) {
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
                $propiedad->photo='/storage/img/photos/'.$name;
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
                    $image->path='/storage/img/photos/'.$name;
                    $image->propertie_id=$propiedad->id;
                    $image->save();
                }
                $tipo=$request->tipo;
                if($tipo=="casa"){
                    $entidad= new House();
                    $entidad->propertie_id=$propiedad->id;
                    $entidad->living_rooms=$request->salas;
                    $entidad->kitchens=$request->cocinas;
                    $entidad->integral_kitchen=$request->integrales;
                    $entidad->dining_rooms=$request->comedores;
                    $entidad->half_bathrooms=$request->half;
                    $entidad->bathrooms=$request->bañoC;
                    $entidad->bedrooms=$request->cuartos;
                    $entidad->yard=$request->patio;
                    $entidad->service_yard=$request->pServicio;
                    $entidad->service_room=$request->cServicio;
                    $entidad->home_office=$request->estudios;
                    $entidad->garages=$request->cocheras;
                    $entidad->security_vigilance=$request->vigilancia;
                    $entidad->cistern=$request->cisterna;
                    $entidad->antiquity=$request->antiguedad;
                    $entidad->construction=$request->construccion;
                    $entidad->terrain=$request->terreno;
                    $entidad->floors=$request->pisos;
                    $entidad->save();
                }
                elseif($tipo=="departamento"){
                    $entidad= new Department();
                    $entidad->propertie_id=$propiedad->id;
                    $entidad->living_rooms=$request->salas;
                    $entidad->kitchens=$request->cocinas;
                    $entidad->integral_kitchen=$request->integrales;
                    $entidad->dining_rooms=$request->comedores;
                    $entidad->half_bathrooms=$request->half;
                    $entidad->bathrooms=$request->bañoC;
                    $entidad->bedrooms=$request->cuartos;
                    $entidad->yard=$request->patio;
                    $entidad->service_yard=$request->pServicio;
                    $entidad->service_room=$request->cServicio;
                    $entidad->home_office=$request->estudios;
                    $entidad->garages=$request->cocheras;
                    $entidad->security_vigilance=$request->vigilancia;
                    $entidad->cistern=$request->cisterna;
                    $entidad->antiquity=$request->antiguedad;
                    $entidad->construction=$request->construccion;
                    $entidad->floors=$request->pisos;
                    $entidad->floor=$request->piso;
                    $entidad->elevator=$request->elevador;
                    $entidad->save();
                }
                elseif($tipo=="local" || $tipo=="oficina"){
                    $entidad= new Premises_Office();
                    $entidad->propertie_id=$propiedad->id;
                    $entidad->construction=$request->construccion;
                    $entidad->half_bathrooms=$request->half;
                    $entidad->floor=$request->piso;
                    $entidad->cistern=$request->cisterna;
                    $entidad->elevator=$request->elevador;
                    $entidad->security_vigilance=$request->vigilancia;
                    if($tipo=="local"){$entidad->type='premises';}
                    else{$entidad->type='office';}
                    $entidad->save();
                }
                elseif($tipo=="terreno"){
                    $entidad= new Terrain();
                    $entidad->propertie_id=$propiedad->id;
                    $entidad->terrain=$request->terreno;
                    $entidad->access_roads=$request->acceso;
                    $entidad->save();
                }
                elseif($tipo=="bodega"){
                    $entidad= new Warehouse();
                    $entidad->propertie_id=$propiedad->id;
                    $entidad->terrain=$request->terreno;
                    $entidad->construction=$request->construccion;
                    $entidad->office=$request->oficina;
                    $entidad->half_bathrooms=$request->half;
                    $entidad->save();
                }
            });
            return redirect('/admin/propiedades')->with('status', '¡Propiedad creada con éxito!');
        }
        catch(QueryException $ex){
            return redirect()->back()->withErrors(['error' => 'ERROR: Algo salió mal, por favor vuela a intentarlo más tarde.']);
        }
    }

    public function editar($id){
        $id=Crypt::decrypt($id);
        $propiedad=Propertie::findOrFail($id);
        return view('admin.editarPropiedad',['propiedad'=>$propiedad]);
    }
}