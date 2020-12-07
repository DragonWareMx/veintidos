@extends('layouts.publiSide')
@section('title')
    Sin Resultados
@endsection
@section('head')
    <link rel="stylesheet" href="{{ asset('/css/O.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@endsection
@section('content')
    <div class="Odiv100 d-block">
        <div class="Otitle"><h1>PROPIEDADES | </h1><h2>CASAS</h2></div>
        @if (true)
            <div class="row">
                {{-- PROPIEDAD --}}
                <div class="col-12 col-md-6 col-lg-4 mt-4">
                    {{-- TARJETA DE LA PROPIEDAD --}}
                    <div class="border rounded-bottom shadow bg-white">
                        <div style="height:auto; min-height: 470px; line-height: 12px !important;">
                            {{-- IMAGEN --}}
                            <div  style="
                            background: url('{{ asset('img/test/pexels-pixabay-276593.jpg')}}') no-repeat center center;
                            background-size: cover;
                            height:220px;">
                                {{-- DIRECCION Y FOTOS --}}
                                <div class="row h-100 align-items-end text-white">
                                    <div class="col-8 text-left">
                                        <img class="d-inline mb-1 ml-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/ubicacion.png')}}" alt="">
                                        <p class="my-1 d-inline" style="text-shadow: 1px 1px 3px black; ">Fracc. Mirasoles, Morelia</p>
                                    </div>
                                    <div class="col-4 text-right">
                                        <img class="d-inline mb-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/images.png')}}" alt="">
                                        <p class="m-1 d-inline" style="text-shadow: 1px 1px 3px black; ">17</p>
                                    </div>
                                </div>
                            </div>
                            {{-- DATOS --}}
                            {{-- TITULO --}}
                            <h5 class="px-2 pt-1 text-blue22">
                                ESTRENA CASA EN VENTA EN FRACC. MIRASOLES, MORELIA P...
                            </h5>
                            {{-- PRECIO Y CLAVE --}}
                            <div class="row align-items-end px-2">
                                <div class="col-7 text-left">
                                    <p class="m-1">$3,173,000</p>
                                </div>
                                <div class="col-5 text-right">
                                    <p class="m-1">Clave: <b>8071</b></p>
                                </div>
                            </div>

                            {{-- DATOS PRINCIPALES --}}
                            <div class="row px-2 mt-4">
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                    <b>Venta</b>
                                </div>
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/casa.png')}}" alt="">
                                    <b>Casa</b>
                                </div>
                                <div class="col">
                                    
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Estado
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Tipo
                                    </p>
                                </div>
                                <div class="col">
                                    
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cama.png')}}" alt="">
                                    <b>4</b>
                                </div>
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt="">
                                    <b>2</b>
                                </div>
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                                    <b>190 m<sup>2</sup></b>
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Recámara
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Baños
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Construcción
                                    </p>
                                </div>
                            </div>

                            {{-- BOTONES --}}
                            <div class="row px-2">
                                <div class="col">
                                    <button type="button" class="btn btn-outline-dark b-blue22 w-100"><b>Ver más</b></button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-primary w-100" style="background: #58AD30; border-color: #58AD30;"><b>Me interesa</b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4">
                    {{-- TARJETA DE LA PROPIEDAD --}}
                    <div class="border rounded-bottom shadow bg-white">
                        <div style="height:auto; min-height: 470px; line-height: 12px !important;">
                            {{-- IMAGEN --}}
                            <div  style="
                            background: url('{{ asset('img/test/pexels-pixabay-276593.jpg')}}') no-repeat center center;
                            background-size: cover;
                            height:220px;">
                                {{-- DIRECCION Y FOTOS --}}
                                <div class="row h-100 align-items-end text-white">
                                    <div class="col-8 text-left">
                                        <img class="d-inline mb-1 ml-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/ubicacion.png')}}" alt="">
                                        <p class="my-1 d-inline" style="text-shadow: 1px 1px 3px black; ">Fracc. Mirasoles, Morelia</p>
                                    </div>
                                    <div class="col-4 text-right">
                                        <img class="d-inline mb-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/images.png')}}" alt="">
                                        <p class="m-1 d-inline" style="text-shadow: 1px 1px 3px black; ">17</p>
                                    </div>
                                </div>
                            </div>
                            {{-- DATOS --}}
                            {{-- TITULO --}}
                            <h5 class="px-2 pt-1 text-blue22">ESTRENA CASA EN VENTA EN FRACC. MIRASOLES, MORELIA P...
                            </h5>
                            {{-- PRECIO Y CLAVE --}}
                            <div class="row align-items-end px-2">
                                <div class="col-7 text-left">
                                    <p class="m-1">$3,173,000</p>
                                </div>
                                <div class="col-5 text-right">
                                    <p class="m-1">Clave: <b>8071</b></p>
                                </div>
                            </div>

                            {{-- DATOS PRINCIPALES --}}
                            <div class="row px-2 mt-4">
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                    <b>Venta</b>
                                </div>
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/casa.png')}}" alt="">
                                    <b>Casa</b>
                                </div>
                                <div class="col">
                                    
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Estado
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Tipo
                                    </p>
                                </div>
                                <div class="col">
                                    
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cama.png')}}" alt="">
                                    <b>4</b>
                                </div>
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt="">
                                    <b>2</b>
                                </div>
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                                    <b>190 m<sup>2</sup></b>
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Recámara
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Baños
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Construcción
                                    </p>
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <button type="button" class="btn btn-outline-dark b-blue22 w-100"><b>Ver más</b></button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-primary w-100" style="background: #58AD30; border-color: #58AD30;"><b>Me interesa</b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4">
                    {{-- TARJETA DE LA PROPIEDAD --}}
                    <div class="border rounded-bottom shadow bg-white">
                        <div style="height:auto; min-height: 470px; line-height: 12px !important;">
                            {{-- IMAGEN --}}
                            <div  style="
                            background: url('{{ asset('img/test/pexels-pixabay-276593.jpg')}}') no-repeat center center;
                            background-size: cover;
                            height:220px;">
                                {{-- DIRECCION Y FOTOS --}}
                                <div class="row h-100 align-items-end text-white">
                                    <div class="col-8 text-left">
                                        <img class="d-inline mb-1 ml-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/ubicacion.png')}}" alt="">
                                        <p class="my-1 d-inline" style="text-shadow: 1px 1px 3px black; ">Fracc. Mirasoles, Morelia</p>
                                    </div>
                                    <div class="col-4 text-right">
                                        <img class="d-inline mb-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/images.png')}}" alt="">
                                        <p class="m-1 d-inline" style="text-shadow: 1px 1px 3px black; ">17</p>
                                    </div>
                                </div>
                            </div>
                            {{-- DATOS --}}
                            {{-- TITULO --}}
                            <h5 class="px-2 pt-1 text-blue22">ESTRENA CASA EN VENTA EN FRACC. MIRASOLES, MORELIA P...
                            </h5>
                            {{-- PRECIO Y CLAVE --}}
                            <div class="row align-items-end px-2">
                                <div class="col-7 text-left">
                                    <p class="m-1">$3,173,000</p>
                                </div>
                                <div class="col-5 text-right">
                                    <p class="m-1">Clave: <b>8071</b></p>
                                </div>
                            </div>

                            {{-- DATOS PRINCIPALES --}}
                            <div class="row px-2 mt-4">
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                    <b>Venta</b>
                                </div>
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/casa.png')}}" alt="">
                                    <b>Casa</b>
                                </div>
                                <div class="col">
                                    
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Estado
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Tipo
                                    </p>
                                </div>
                                <div class="col">
                                    
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cama.png')}}" alt="">
                                    <b>4</b>
                                </div>
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt="">
                                    <b>2</b>
                                </div>
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                                    <b>190 m<sup>2</sup></b>
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Recámara
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Baños
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Construcción
                                    </p>
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <button type="button" class="btn btn-outline-dark b-blue22 w-100"><b>Ver más</b></button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-primary w-100" style="background: #58AD30; border-color: #58AD30;"><b>Me interesa</b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4">
                    {{-- TARJETA DE LA PROPIEDAD --}}
                    <div class="border rounded-bottom shadow bg-white">
                        <div style="height:auto; min-height: 470px; line-height: 12px !important;">
                            {{-- IMAGEN --}}
                            <div  style="
                            background: url('{{ asset('img/test/pexels-pixabay-276593.jpg')}}') no-repeat center center;
                            background-size: cover;
                            height:220px;">
                                {{-- DIRECCION Y FOTOS --}}
                                <div class="row h-100 align-items-end text-white">
                                    <div class="col-8 text-left">
                                        <img class="d-inline mb-1 ml-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/ubicacion.png')}}" alt="">
                                        <p class="my-1 d-inline" style="text-shadow: 1px 1px 3px black; ">Fracc. Mirasoles, Morelia</p>
                                    </div>
                                    <div class="col-4 text-right">
                                        <img class="d-inline mb-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/images.png')}}" alt="">
                                        <p class="m-1 d-inline" style="text-shadow: 1px 1px 3px black; ">17</p>
                                    </div>
                                </div>
                            </div>
                            {{-- DATOS --}}
                            {{-- TITULO --}}
                            <h5 class="px-2 pt-1 text-blue22">ESTRENA CASA EN VENTA EN FRACC. MIRASOLES, MORELIA P...
                            </h5>
                            {{-- PRECIO Y CLAVE --}}
                            <div class="row align-items-end px-2">
                                <div class="col-7 text-left">
                                    <p class="m-1">$3,173,000</p>
                                </div>
                                <div class="col-5 text-right">
                                    <p class="m-1">Clave: <b>8071</b></p>
                                </div>
                            </div>

                            {{-- DATOS PRINCIPALES --}}
                            <div class="row px-2 mt-4">
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                    <b>Venta</b>
                                </div>
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/casa.png')}}" alt="">
                                    <b>Casa</b>
                                </div>
                                <div class="col">
                                    
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Estado
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Tipo
                                    </p>
                                </div>
                                <div class="col">
                                    
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cama.png')}}" alt="">
                                    <b>4</b>
                                </div>
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt="">
                                    <b>2</b>
                                </div>
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                                    <b>190 m<sup>2</sup></b>
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Recámara
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Baños
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Construcción
                                    </p>
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <button type="button" class="btn btn-outline-dark b-blue22 w-100"><b>Ver más</b></button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-primary w-100" style="background: #58AD30; border-color: #58AD30;"><b>Me interesa</b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4">
                    {{-- TARJETA DE LA PROPIEDAD --}}
                    <div class="border rounded-bottom shadow bg-white">
                        <div style="height:auto; min-height: 470px; line-height: 12px !important;">
                            {{-- IMAGEN --}}
                            <div  style="
                            background: url('{{ asset('img/test/pexels-pixabay-276593.jpg')}}') no-repeat center center;
                            background-size: cover;
                            height:220px;">
                                {{-- DIRECCION Y FOTOS --}}
                                <div class="row h-100 align-items-end text-white">
                                    <div class="col-8 text-left">
                                        <img class="d-inline mb-1 ml-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/ubicacion.png')}}" alt="">
                                        <p class="my-1 d-inline" style="text-shadow: 1px 1px 3px black; ">Fracc. Mirasoles, Morelia</p>
                                    </div>
                                    <div class="col-4 text-right">
                                        <img class="d-inline mb-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/images.png')}}" alt="">
                                        <p class="m-1 d-inline" style="text-shadow: 1px 1px 3px black; ">17</p>
                                    </div>
                                </div>
                            </div>
                            {{-- DATOS --}}
                            {{-- TITULO --}}
                            <h5 class="px-2 pt-1 text-blue22">ESTRENA CASA EN VENTA EN FRACC. MIRASOLES, MORELIA P...
                            </h5>
                            {{-- PRECIO Y CLAVE --}}
                            <div class="row align-items-end px-2">
                                <div class="col-7 text-left">
                                    <p class="m-1">$3,173,000</p>
                                </div>
                                <div class="col-5 text-right">
                                    <p class="m-1">Clave: <b>8071</b></p>
                                </div>
                            </div>

                            {{-- DATOS PRINCIPALES --}}
                            <div class="row px-2 mt-4">
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                    <b>Venta</b>
                                </div>
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/casa.png')}}" alt="">
                                    <b>Casa</b>
                                </div>
                                <div class="col">
                                    
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Estado
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Tipo
                                    </p>
                                </div>
                                <div class="col">
                                    
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cama.png')}}" alt="">
                                    <b>4</b>
                                </div>
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt="">
                                    <b>2</b>
                                </div>
                                <div class="col">
                                    <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                                    <b>190 m<sup>2</sup></b>
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Recámara
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Baños
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                                        Construcción
                                    </p>
                                </div>
                            </div>
                            <div class="row px-2">
                                <div class="col">
                                    <button type="button" class="btn btn-outline-dark b-blue22 w-100"><b>Ver más</b></button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-primary w-100" style="background: #58AD30; border-color: #58AD30;"><b>Me interesa</b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        
            {{-- NO SE ENCOTRARON RESULTADOS --}}
            <div class="OGreenText OBR70">No se encontraron resultados</div>
            <div class="OBR70 OContactUs">
                <h1>CONTÁCTANOS</h1>
                <div class="OContactUsItem">
                    <img class="OContactUsImg" src="{{ asset('img/ico/phone.png') }}" alt="">
                    <div class="OContactUsTitle">Teléfono</div>
                </div>
                <div class="OContactUsItem">
                    <div class="OContactUsValue">4433370550</div>
                </div>
                <div class="OContactUsItem">
                    <img class="OContactUsImg" src="{{ asset('img/ico/email.png') }}" alt="">
                    <div class="OContactUsTitle">Correo electrónico</div>
                </div>
                <div class="OContactUsItem">
                    <div class="OContactUsValue">contacto@veintidos.mx</div>
                </div>
            </div>
            <div class="OWidth100 OCenterItem"> 
                <a href="#" class="OButtonInicio">
                    <div class="OButtonInicioText">INICIO</div>
                    <img class="OButtonInicioArrow" src="{{ asset('img/ico/next-white.png') }}" alt="">
                </a>
            </div>  
        @endif
    </div>
@endsection