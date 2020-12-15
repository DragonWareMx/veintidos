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
                                <div id="imagen-seleccionada" class="mx-auto" style="height: 400px; width: 95%; background: url('') no-repeat center center; background-size: cover;">
                                </div>

                                {{-- Carousel --}}
                                <div class="mx-auto mt-2" style="width: 95%;">
                                    <div class="owl-carousel owl-theme mx-auto"  style="width: 500px;">
                                        <div class="item" style="width:110px; height:80px; background: url('{{ asset('img/test/pexels-pixabay-276593.jpg')}}') no-repeat center center; background-size: cover;" onclick="clickImagen('{{ asset('img/test/pexels-pixabay-276593.jpg')}}')"></div>
                                        <div class="item" style="width:110px; height:80px; background: url('{{ asset('img/test/pexels-pixabay-276593.jpg')}}') no-repeat center center; background-size: cover;"></div>
                                        <div class="item" style="width:110px; height:80px; background: url('{{ asset('img/test/pexels-pixabay-276593.jpg')}}') no-repeat center center; background-size: cover;"></div>
                                        <div class="item" style="width:110px; height:80px; background: url('{{ asset('img/test/pexels-pixabay-276593.jpg')}}') no-repeat center center; background-size: cover;"></div>
                                        <div class="item" style="width:110px; height:80px; background: url('{{ asset('img/test/pexels-pixabay-276593.jpg')}}') no-repeat center center; background-size: cover;"></div>
                                        <div class="item" style="width:110px; height:80px; background: url('{{ asset('img/test/pexels-pixabay-276593.jpg')}}') no-repeat center center; background-size: cover;"></div>
                                        <div class="item" style="width:110px; height:80px; background: url('{{ asset('img/test/pexels-pixabay-276593.jpg')}}') no-repeat center center; background-size: cover;"></div>
                                        <div class="item" style="width:110px; height:80px; background: url('{{ asset('img/test/pexels-pixabay-276593.jpg')}}') no-repeat center center; background-size: cover;"></div>
                                    </div>
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
            $('.owl-carousel').owlCarousel({
                margin:10,
                loop:false,
                autoWidth:true,
                items:4,
            })
        });

        
    //pre es el elemento donde se muestra la previsualizacion de la imagen seleccionada
    //"imagen-seleccionada" es el visualizador de la imagen
    var pre = document.getElementById("imagen-seleccionada");
    //imagen es la imagen que se ha seleccionado
    var imagen = pre.style.backgroundImage;

    //controla cuando se selecciona una imagen
    function clickImagen(nuevaImagen){
        console.log(imagen);
        //hace que se muestre la nueva imagen en el visualizador
        pre.style.backgroundImage = "url('"+ nuevaImagen + "')";

        imagen = nuevaImagen;
    }
    </script>
@endsection