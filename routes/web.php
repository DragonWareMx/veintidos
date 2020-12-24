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

Route::get('/inicio', function () {
    return view('test');
})->name('inicio');

Route::get('/notFound', function () {
    return view('notFound');
});

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

Route::get('/admin', function () {
    return redirect('/admin/inicio');
})->middleware('auth');

Route::get('/admin/inicio', function () {
    return view('admin.inicio');
})->middleware('auth');

Route::get('/admin/cuenta', function () {
    return view('admin.cuenta');
})->middleware('auth');

Route::get('/admin/agregar/propiedad', 'adminPropiedades@agregar')->name('agregarPropiedad');


Route::get('/admin/mensajes', function () {
    return view('admin.mensajes');
})->middleware('auth');

Route::get('/admin/solicitudes', function () {
    return view('admin.solicitudes');
})->middleware('auth');

//------------------------ RUTAS PROPIEDADES ------------------------
// Route::get('/propiedades', function () {
//     return view('propiedades.propiedades');
// });
Route::get('/propiedades', 'propiedadesController@ver')->name('verPropiedades');

Route::get('/propiedad/{id}', 'propiedadesController@propiedad');