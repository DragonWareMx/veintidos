@extends('layouts.publi')
@section('title')
    Sin Resultados
@endsection
@section('head')
    <link rel="stylesheet" href="{{ asset('/css/O.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/contactanos.css') }}">
@endsection
@section('content')
    <div class="Odiv100 d-block">
        <div class="Otitle"><h1>PROPIEDADES | </h1><h2>CASAS</h2></div>
        <div class="border rounded-bottom shadow bg-white">
            <div class="row">
                {{-- AQUI VA LA GALERIA DE FOTOS --}}
                <div class="col">
                </div>
                {{-- DATOS DE LA PROPIEDAD --}}
                <div class="col">
                    {{-- NOMBRE DE LA PROPIEDAD --}}
                    <h5 class="px-2 pt-1 text-blue22">
                        ESTRENA CASA EN VENTA EN FRACC. MIRASOLES, MORELIA, Lorem ipsum dolor sit amet consectetur
                    </h5>

                    {{-- COSTO CLAVE Y COMPARTIR --}}
                    <div class="row align-items-end px-2">
                        <div class="col-7 text-left">
                            <p class="m-1">$3,173,000</p>
                        </div>
                        <div class="col-5 text-right">
                            <p class="m-1">Clave: <b>8071</b></p>
                        </div>
                    </div>

                    {{-- UBICACION --}}

                    {{-- DATOS GENERALES --}}
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

                    {{-- DESCRIPCION --}}
                    <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px;">
                        Recámara
                    </p>
                    <P>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </P>
                </div>
            </div>
            <div class="row px-2">
                <div class="col">
                    <button type="button" class="btn btn-primary" style="background: #58AD30; border-color: #58AD30;"><b>Me interesa</b></button>
                </div>
            </div>
        </div>

        {{-- AQUI VA EL CARRUSEL DE LAS PROPIEDADES --}}
    </div>
@endsection