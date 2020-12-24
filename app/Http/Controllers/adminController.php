<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
