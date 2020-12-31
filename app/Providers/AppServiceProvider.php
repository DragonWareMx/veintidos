<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Propertie;
use App\Department;
use App\House;
use App\Terrain;
use App\WareHouse;
use App\Proposal;
use App\C_Proposal;
use App\Premises_Office;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $numProp=[];
        $numProp['casas']=House::count();
        $numProp['departamentos']=Department::count();
        $numProp['terrenos']=Terrain::count();
        $numProp['bodegas']=Warehouse::count();
        $numProp['oficinas']=Premises_Office::where('type','office')->count();
        $numProp['locales']=Premises_Office::where('type','premises')->count();
        view()->share(['numProp'=>$numProp]);
    }
}
