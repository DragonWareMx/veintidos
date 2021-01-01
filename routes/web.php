<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('inicio');
});

Route::get('/inicio','indexController@index' )->name('inicio');

Route::get('/notFound', function () {
    return view('notFound');
});

Route::get('/terminos_y_condiciones', function () {
    return view('terminos_condiciones');
});

Route::get('/aviso_de_privacidad', function () {
    return view('aviso_privacidad');
});

Route::post('/contactanos','contactanosController@contactanos')->name('contactanos-mssg');

Route::get('/contactanos', function () {
    return view('contactanos');
})->name('contactanos');

Route::get('/quienes_somos', function () {
    return view('quienesSomos');
})->name('quienesSomos');

Route::get('/veintidos', function () {
    return view('veintidos');
});

// TESTEO------------------------------------------------------------------------
Route::get('/sideBar', function () {
    return view('layouts.sideBar');
});

Route::get('/aver', function () {
    if (Request::url() == route('caca')) {
        return 'simonkey';
    } else {
        return 'nelson';
    }
})->name('caca');


Route::get('/sesion', function () {
    return view('BORRARalterminar');
});

// Route::get('/home', 'HomeController@index')->name('home');

// ADMINISTRACIÓN------------------------------------------------------------------------
Auth::routes(['register' => false]);

Route::get('/admin', 'adminController@index')->name('adminIndex');

Route::get('/admin/cuenta', 'adminController@cuenta')->name('cuenta');

Route::patch('/admin/cuenta/{id}', 'adminController@cuentaUpdate')->name('cuenta-update');

// Route::get('/admin/inicio', function () {
//     return view('admin.inicio');
// })->middleware('auth');

Route::get('/admin/propiedades', 'adminPropiedades@ver')->name('propiedades');

Route::get('/admin/agregar/propiedad', 'adminPropiedades@agregar')->name('agregarPropiedad');
Route::post('/admin/agregar/propiedad', 'adminPropiedades@agregarPost')->name('agregarPropiedadPost');

Route::get('/admin/solicitudes','adminController@solicitudes')->name('solicitudes');
Route::patch('/admin/solicitudes','adminController@solicitudesUpdate')->name('solicitudes-update');

Route::get('/admin/mensajes','adminController@mensajes')->name('mensajes');
Route::patch('/admin/mensajes','adminController@mensajesUpdate')->name('mensajes-update');



//------------------------ RUTAS PROPIEDADES ------------------------
// Route::get('/propiedades', function () {
//     return view('propiedades.propiedades');
// });

//VER TODAS LAS PROPIEDADES
Route::get('/propiedades', 'propiedadesController@ver')->name('verPropiedades');

//VER UNA PROPIEDAD
Route::get('/propiedad/{id}', 'propiedadesController@propiedad')->name('propiedad');

//PROPUESTA DE PROPIEDAD
Route::post('/propiedad/{id}', 'propiedadesController@propuesta');
