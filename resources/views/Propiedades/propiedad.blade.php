@extends('layouts.publi')
@section('title')
    Sin Resultados
@endsection
@section('head')
    <link rel="stylesheet" href="{{ asset('/css/O.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/css/bootstrap.css') }}">

    {{-- OWL CAROUSEL --}}
    <link rel="stylesheet" href="{{ asset('/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">

    <script src="{{ asset('/plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>
@endsection
@section('content')
    <div class="container">
        <div class="Odiv100 d-block">
            <div class="Otitle"><h1>PROPIEDADES | </h1><h2>CASAS</h2></div>

            <div class="border rounded-bottom shadow bg-white mt-4">
                <div class="row mt-4">
                    {{-- AQUI VA LA GALERIA DE FOTOS --}}
                    <div class="col">
                            <div class="w-100 h-100">
                                {{-- IMAGEN SELECCIONADA --}}
                                <div class="mx-auto bg-dark" style="height: 400px; width: 95%;">
                                </div>

                                {{-- Carousel --}}
                                <div class="mx-auto mt-2" style="width: 95%;">
                                    <ul class="owl-carousel owl-theme">
                                        <li>
                                            <a href="http://placehold.it/1280x720" data-size="1280x720"><img  src="http://placehold.it/1280x720" alt="1" title="Imagen 1"></a>
                                        </li>
                                        <li>
                                            <a href="http://placehold.it/720x1280" data-size="720x1280"><img  src="http://placehold.it/720x1280" style="height:70px;" alt="2" title="Imagen 2"></a>
                                        </li>
                                        <li>
                                            <a href="http://placehold.it/1920x1920" data-size="1920x1920">
                                              <img  src="http://placehold.it/400x300" alt="3">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://placehold.it/960x640" data-size="960x640">
                                              <img  src="http://placehold.it/400x300" alt="4">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                    {{-- DATOS DE LA PROPIEDAD --}}
                    <div class="col">
                        {{-- NOMBRE DE LA PROPIEDAD --}}
                        <h5 class="px-2 pt-1 text-blue22" style="font-weight: 600;">
                            ESTRENA CASA EN VENTA EN FRACC. MIRASOLES, MORELIA, Lorem ipsum dolor sit amet consectetur
                        </h5>

                        {{-- COSTO CLAVE Y COMPARTIR --}}
                        <div class="row align-items-end" style="padding-right: 2rem; padding-left: 0.5rem">
                            <div class="col-7 text-left">
                                <p class="m-1" style="font-weight: 600; font-size: 24px;">$3,173,000</p>
                            </div>
                            <div class="col-5 text-right d-flex justify-content-between">
                                <p class="m-1">Clave: <b>8071</b></p>
                                <img class="ml-auto" style="width:17px; height:17px; " src="{{ asset('img/ico/share.png')}}" alt="">
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
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Estado
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
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
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Recámara
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Baños
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Construcción
                                </p>
                            </div>
                        </div>

                        {{-- DESCRIPCION --}}
                        <div class="row text-justify" style="padding-right: 2rem; padding-left: 0.5rem">
                            <p class="font-weight-light pt-1 mb-2" style="color: #818181; font-size: 12px;">
                                Descripción
                            </p>
                            <P>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </P>
                        </div>
                    </div>
                </div>
                <div class="row px-4 d-flex flex-row-reverse my-4">
                    <div style="width: fit-content">
                        <button type="button" class="btn btn-primary" style="background: #58AD30; border-color: #58AD30;"><b>Me interesa</b></button>
                    </div>
                </div>
            </div>

            {{-- AQUI VA EL CARRUSEL DE LAS PROPIEDADES --}}
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                loop:false,
                margin:10,
                nav:true,
                autoWidth:false,
                autoHeight:false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            });
        });
    </script>
@endsection