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
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
})->name('inicio');

Route::get('/notFound', function () {
    return view('notFound');
});

Route::get('/sideBar', function () {
    return view('layouts.sideBar');
});

Route::get('/contactanos', function () {
    return view('contactanos');
});

Route::get('/veintidos', function () {
    return view('veintidos');
});






Route::get('/aver', function () {
    if(Request::url()== route('caca')){
        return 'simonkey';
    }
    else{
        return 'nelson';
    }
})->name('caca');
