<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\User;
use App\Propertie;
use App\Department;
use App\House;
use App\Terrain;
use App\WareHouse;
use App\Premises_Office;
use Auth;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index()
    {
        $propiedades = Propertie::count();
        $departamentos = Department::count();
        $casas = House::count();
        $terrenos = Terrain::count();
        $bodegas = WareHouse::count();
        $locales = Premises_Office::count();
        $oficinas = Premises_Office::count();
        return view('admin.inicio',['propiedades' => $propiedades, 'departamentos' => $departamentos, 'casas' => $casas, 'terrenos' => $terrenos, 'bodegas' => $bodegas, 'locales' => $locales, 'oficinas' => $oficinas]);
    }

    public function cuenta()
    {
        try { 
            $usuario = User::where('id',Auth::id())->get();
        } catch(QueryException $ex){ 
            return view('errors.404', ['mensaje' => 'No fue posible conectarse con la base de datos']);
        }

        return view('admin.cuenta', ['usuario' => $usuario]);
    }

    public function cuentaUpdate($id){
        $data=request()->validate([
            'nombre'=>'required|max:191',
            'apellido'=>'required|max:191',
            'correo'=>'required',
            'passActual'=>'required',
            'password'=>'required',
            'cfmPassword'=>'required'
        ]);
        $change=0;
        try{
            DB::transaction(function() use ($id)
            {
               $user=User::findOrFail($id);
               $user->name=request('nombre');
               $user->lastname=request('apellido');
               $user->email=request('correo');
               if( Hash::check( request('passActual'), $user->password ) ){
                    $change=1;
                    $user->password=bcrypt(request('password'));
                }
                else{
                    $change=2;
                }
               $user->save();

            });
        }
        catch(QueryException $ex){
            return redirect()->back()->withErrors(['error' => 'ERROR: No se pudieron actualizar los datos']);
        }

        try { 
         $usuario = User::where('id',Auth::id())->get();
        } catch(QueryException $ex){ 
            return view('errors.404', ['mensaje' => 'No fue posible conectarse con la base de datos']);
        }

        if($change == 1){
            return view('admin.cuenta', ['usuario' => $usuario]);
        }
        else if($change == 2){
            return redirect()->back()->withErrors(['error' => 'ERROR: La contraseña es incorrecta']);
        }
        else{
            return redirect()->back()->withErrors(['error' => 'ERROR: No se pudieron actualizar los datos']);
        }        
    }
}