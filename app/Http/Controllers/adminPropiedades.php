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
            'fotos.*' => 'image|required|mimes:jpeg,jpg,png,PNG,bmp,gif,svg',
            'titulo'=> 'max:255 |required |regex:/[a-zA-Z áéíóúÁÉÍÓÚ\,\.]+$/',
            'tipo' => 'required',
            'owner' => 'required|max:255|regex:/[a-zA-Z áéíóúÁÉÍÓÚ\,\.]+$/',
            'deal' => 'required',
            'precio' => 'required|numeric',
            'estatus' => 'required',
            'ciudad' => 'max:255 |regex:/[a-zA-Z áéíóúÁÉÍÓÚ\,\.]+$/',
            'colonia' => 'required|max:255|regex:/[a-zA-Z0-9 áéíóúÁÉÍÓÚ\,\.]+$/',
            'calle' => 'max:255|required|max:255|regex:/[a-zA-Z0-9 áéíóúÁÉÍÓÚ\,\.]+$/',
            'int' => 'max:10|alpha_num|nullable',
            'ext' => 'max:10|alpha_num|nullable',
            'estado' => 'max:255 |required|regex:/[a-zA-Z áéíóúÁÉÍÓÚ\,\.]+$/',
            'municipio' => 'max:255 |required|regex:/[a-zA-Z áéíóúÁÉÍÓÚ\,\.]+$/',
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
            'descripcion' => 'max:700|required|required|max:255|regex:/[a-zA-Z0-9 áéíóúÁÉÍÓÚ\,\.]+$/',
            'info' => 'max:500|required|max:255|regex:/[a-zA-Z0-9 áéíóúÁÉÍÓÚ\,\.]+$/',
        ]);
        try{
            DB::transaction(function () use ($request) {
                $propiedad = new Propertie();
                $propiedad->owner_name=$request->owner;
                $propiedad->owner_info=$request->info;
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
            if($request->ajax()){
                session()->flash('status','¡Propiedad creada con éxito!');
                return 200;
            }
            return redirect('/admin/propiedades')->with('status', '¡Propiedad creada con éxito!');
        }
        catch(QueryException $ex){
            if($request->ajax()){
                return response()->json(['errors' => ['catch' => [0 => 'Ocurrió un error inesperado, intentalo más tarde.']]], 500);
            }
            return redirect()->back()->withErrors(['error' => 'ERROR: Algo salió mal, por favor vuela a intentarlo más tarde.']);
        }
    }

    public function editar($id){
        $propiedad=Propertie::findOrFail($id);
        return view('admin.editarPropiedad',['propiedad'=>$propiedad]);
    }

    public function editarPost(Request $request, $id){
        $id=Crypt::decrypt($id);
        $request->validate([
            'fotos.*' => 'image|required|mimes:jpeg,jpg,png,PNG,bmp,gif,svg',
            'titulo'=> 'max:255 |required |regex:/[a-zA-Z áéíóúÁÉÍÓÚ\,\.]+$/',
            'tipo' => 'required',
            'owner' => 'required|max:255|regex:/[a-zA-Z áéíóúÁÉÍÓÚ\,\.]+$/',
            'deal' => 'required',
            'precio' => 'required|numeric',
            'estatus' => 'required',
            'ciudad' => 'max:255 |regex:/[a-zA-Z áéíóúÁÉÍÓÚ\,\.]+$/',
            'colonia' => 'required|max:255|regex:/[a-zA-Z0-9 áéíóúÁÉÍÓÚ\,\.]+$/',
            'calle' => 'max:255|required|max:255|regex:/[a-zA-Z0-9 áéíóúÁÉÍÓÚ\,\.]+$/',
            'int' => 'max:10|alpha_num|nullable',
            'ext' => 'max:10|alpha_num|nullable',
            'estado' => 'max:255 |required|regex:/[a-zA-Z áéíóúÁÉÍÓÚ\,\.]+$/',
            'municipio' => 'max:255 |required|regex:/[a-zA-Z áéíóúÁÉÍÓÚ\,\.]+$/',
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
            'descripcion' => 'max:700|required|required|max:255|regex:/[a-zA-Z0-9 áéíóúÁÉÍÓÚ\,\.]+$/',
            'info' => 'max:500|required|max:255|regex:/[a-zA-Z0-9 áéíóúÁÉÍÓÚ\,\.]+$/',
        ]);
        try{
            DB::transaction(function () use ($request,$id) {
                $propiedad = Propertie::findOrFail($id);
                $propiedad->owner_name=$request->owner;
                $propiedad->owner_info=$request->info;
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
                if(isset($request->fotos)){ 
                    $oldFile=public_path().$propiedad->photo;
                    if(file_exists($oldFile)){
                        unlink($oldFile);
                    }
                    $name = $request->fotos['0']->getClientOriginalName();
                    $name = pathinfo( $name,PATHINFO_FILENAME);
                    $extension = $request->fotos['0']->getClientOriginalExtension();
                    $name=$name.'_'.time().'.'.$extension;
                    $path = $request->fotos['0']->storeAs('/public/img/photos',$name);
                    $propiedad->photo='/storage/img/photos/'.$name;
                }
                $propiedad->save();
                if(isset($request->fotos)){
                    $aux=0;
                    foreach($propiedad->photos as $photo){
                        $oldFile=public_path().$photo->path;
                        if(file_exists($oldFile)){
                            unlink($oldFile);
                        }
                        $photo->delete();
                    }
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
                }
                $tipo=$request->tipo;
                if($tipo=="casa"){
                    $entidad=House::where('propertie_id',$propiedad->id)->first();
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
                    $entidad=Department::where('propertie_id',$propiedad->id)->first();
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
                    $entidad=Premises_Office::where('propertie_id',$propiedad->id)->first();
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
                    $entidad=Terrain::where('propertie_id',$propiedad->id)->first();
                    $entidad->propertie_id=$propiedad->id;
                    $entidad->terrain=$request->terreno;
                    $entidad->access_roads=$request->acceso;
                    $entidad->save();
                }
                elseif($tipo=="bodega"){
                    $entidad=Warehouse::where('propertie_id',$propiedad->id)->first();
                    $entidad->propertie_id=$propiedad->id;
                    $entidad->terrain=$request->terreno;
                    $entidad->construction=$request->construccion;
                    $entidad->office=$request->oficina;
                    $entidad->half_bathrooms=$request->half;
                    $entidad->save();
                }
            });
            if($request->ajax()){
                session()->flash('status','¡Propiedad editada con éxito!');
                return 200;
            }
            return redirect('/admin/propiedades')->with('status', '¡Propiedad editada con éxito!');
        }
        catch(QueryException $ex){
            if($request->ajax()){
                return response()->json(['errors' => ['catch' => [0 => 'Ocurrió un error inesperado, intentalo más tarde.']]], 500);
            }
            return redirect()->back()->withErrors(['error' => 'ERROR: Algo salió mal, por favor vuela a intentarlo más tarde.']);
        }
    }
    public function eliminar($id){
        $id=Crypt::decrypt($id);
        try{
            DB::transaction(function () use ($id) {
                $propiedad = Propertie::findOrFail($id);
                $oldFile=public_path().$propiedad->photo;
                if(file_exists($oldFile)){
                    unlink($oldFile);
                }
                foreach($propiedad->photos as $photo){
                    $oldFile=public_path().$photo->path;
                    if(file_exists($oldFile)){
                        unlink($oldFile);
                    }
                }
                $propiedad->delete();
            });
            return redirect('/admin/propiedades')->with('status', '¡Propiedad eliminada con éxito!');
        }
        catch(QueryException $ex){
            return redirect()->back()->withErrors(['error' => 'ERROR: Algo salió mal, por favor vuela a intentarlo más tarde.']);
        }
    }
}