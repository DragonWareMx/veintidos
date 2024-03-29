@extends('layouts.publi')
@section('title')
    Propiedad
@endsection
@section('head')
    <link rel="stylesheet" href="{{ asset('/css/O.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/css/bootstrap.css') }}">

    {{-- OWL CAROUSEL --}}
    <link rel="stylesheet" href="{{ asset('/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">

    <script src="{{ asset('/plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>

    {{-- VALIDACION --}}
    <script src="{{ asset('/plugins/parsley.js') }}"></script>
    
    <style>
        .owl-w{
            width: 100%;
        }
        .pswp {
            z-index: 99999;
        }

        .btnC-b:focus, .btnC-b:active{
            outline: none !important;
            box-shadow: none;
        }
        .col-car{
            width: 50%;
        }
        .text-ps{
            line-height: 5px;
        }
        @media (max-width: 350px){
            .text-ps{
                line-height: 10px;
            }
        }
        @media (max-width: 1200px){
            .col-car {
                width: 100%;
                flex: 1 0 0%;
            }
        }
    </style>

    {!! htmlScriptTagJsApi([ "lang" => "es" ]) !!}

    {{-- PHOTOSWIPE --}}

    <!-- Core CSS file -->
    <link rel="stylesheet" href="{{ asset('/plugins/PhotoSwipe/dist/photoswipe.css') }}"> 

    <!-- Skin CSS file (styling of UI - buttons, caption, etc.)
        In the folder of skin CSS file there are also:
        - .png and .svg icons sprite, 
        - preloader.gif (for browsers that do not support CSS animations) -->
    <link rel="stylesheet" href="{{ asset('/plugins/PhotoSwipe/dist/default-skin/default-skin.css') }}"> 

    <!-- Core JS file -->
    <script src="{{ asset('/plugins/PhotoSwipe/dist/photoswipe.min.js') }}"></script> 

    <!-- UI JS file -->
    <script src="{{ asset('/plugins/PhotoSwipe/dist/photoswipe-ui-default.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
@endsection
@section('content')
    <div class="container">
        <div class="Odiv100 d-block">
            @if($propiedad)

                <div class="Otitle"><h1>PROPIEDADES | </h1><h2>{{ $tipo }}</h2></div>

                <div class="border rounded-bottom shadow bg-white mt-4">
                    @if (session('status'))
                        <div class="row mt-4 px-4">
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif
    
                    <div class="row mt-4">
                        {{-- AQUI VA LA GALERIA DE FOTOS --}}
                        <div class="col-car">
                                <div class="w-100 h-100">
                                    {{-- IMAGEN SELECCIONADA --}}
                                    <div id="imagen-seleccionada" class="mx-auto" style="height: 400px; width: 95%; background: url('{{ asset($propiedad->photo) }}') no-repeat center center; background-size: cover; cursor: pointer;">
                                    </div>

                                    {{-- Carousel --}}
                                    <div class="mx-auto mt-2" style="width: 95%;">
                                        <div class="owl-carousel owl-theme owl-w" id="galeria-carousel">
                                            <div class="item" style="width:110px; height:80px; background: url('{{ asset($propiedad->photo) }}') no-repeat center center; background-size: cover; cursor: pointer;" onclick="clickImagen('{{ asset($propiedad->photo) }}'); setIndex(0)"></div>
                                            @php
                                                $index = 0;
                                            @endphp
                                            @foreach ($propiedad->photos as $photo)
                                                @php
                                                    $index++;
                                                @endphp
                                                <div class="item" style="width:110px; height:80px; background: url('{{ asset($photo->path) }}') no-repeat center center; background-size: cover; cursor: pointer;" onclick="clickImagen('{{ asset($photo->path) }}'); setIndex({{ $index }})"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                        </div>
                        {{-- DATOS DE LA PROPIEDAD --}}
                        <div class="col-xl">
                            {{-- NOMBRE DE LA PROPIEDAD --}}
                            <h5 class="px-2 pt-1 text-blue22" style="font-weight: 600;">
                                {{ $propiedad->title }}
                            </h5>

                            {{-- COSTO CLAVE Y COMPARTIR --}}
                            <div class="row" style="padding-right: 2rem;">
                                <div class="col-sm-7 text-left">
                                    <p class="m-1" style="font-weight: 600; font-size: 24px;">${{ number_format($propiedad->price, 2) }}</p>
                                </div>
                                <div class="col-sm-5 text-right">
                                    <div class="row my-1">
                                        <div class="col text-left"><p class="m-1">Clave: <b>{{str_pad($propiedad->id, 4, '0', STR_PAD_LEFT)}}</b></p></div>
                                        <div class="col">
                                            <div class="dropdown show pl-5">
                                                <img class="ml-auto" style="width:17px; height:17px; " src="{{ asset('img/ico/share.png')}}" alt="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        
                                                {{-- <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Dropdown link
                                                </a> --}}
                                                
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook">Facebook</a>
                                                    <a class="dropdown-item" href="https://wa.me/?text={{ urlencode (url()->current()) }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Whatsapp">WhatsApp</a>
                                                    <a class="dropdown-item" data-toggle="tooltip" title="¡Link copiado al portapapeles!" data-link="{{ url()->current() }}" id="copiarPP">Copiar en el portapapeles</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- UBICACION --}}
                            <div class="row" style="padding-right: 2rem;">
                                <div class="col-12 text-left d-flex mt-2">
                                    <img class="m-1" style="width:17px; height:17px; " src="{{ asset('img/ico/ubicacion2.png')}}" alt="">
                                    <p class="m-1">{{ $propiedad->street }}
                                        @if ($propiedad->ext_number)
                                            #{{ $propiedad->ext_number }}
                                        @else
                                            S/N
                                        @endif,
                                        @if ($propiedad->int_number)
                                            número interior #{{ $propiedad->int_number }},
                                        @endif
                                        {{ $propiedad->suburb }},
                                        {{ $propiedad->town }},
                                        {{ $propiedad->state }},
                                        México.
                                    </p>
                                </div>
                            </div>

                            {{-- DATOS GENERALES --}}
                            @switch($tipo)
                                @case('CASA')
                                    {{-- ESTADO / TIPO / TERRENO --}}
                                    <div class="row px-2 mt-4">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                            @if ($propiedad->deal == 'sale')
                                                <b>Venta</b>
                                            @else
                                                <b>Renta</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/casa.png')}}" alt="">
                                            <b>Casa</b>
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/terreno2.png')}}" alt="">
                                            <b>{{ $propiedad->house->terrain }} m<sup>2</sup></b>
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
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Terreno
                                            </p>
                                        </div>
                                    </div>
                                    {{-- RECAMARAS / BAÑOS / CONSTRUCCION --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cama.png')}}" alt="">
                                            <b>{{ $propiedad->house->bedrooms }}</b>
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt="">
                                            <b>{{ $propiedad->house->bathrooms }}</b>
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                                            <b>{{ $propiedad->house->construction }} m<sup>2</sup></b>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Recámaras
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1 text-ps" style="color: #818181; font-size: 12px;">
                                                Baños Completos
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Construcción
                                            </p>
                                        </div>
                                    </div>
                                    {{-- COCINAS / COCINAS INTEGRALES / COMEDORES --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            {{-- <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cama.png')}}" alt=""> --}}
                                            <b>{{ $propiedad->house->kitchens }}</b>
                                        </div>
                                        <div class="col">
                                            {{-- <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt=""> --}}
                                            @if ($propiedad->house->integral_kitchen)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/comedor.png')}}" alt="">
                                            <b>{{ $propiedad->house->dining_rooms }}</b>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Cocinas
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1 text-ps" style="color: #818181; font-size: 12px;">
                                                Cocina Integral
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Comedores
                                            </p>
                                        </div>
                                    </div>
                                    {{-- SALAS / MEDIOS BAÑOS / PATIO --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/sala.png')}}" alt="">
                                            <b>{{ $propiedad->house->living_rooms }}</b>
                                        </div>
                                        <div class="col">
                                            {{-- <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt=""> --}}
                                            <b>{{ $propiedad->house->half_bathrooms }}</b>
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/patio.png')}}" alt="">
                                            @if ($propiedad->house->yard)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Salas
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1 text-ps" style="color: #818181; font-size: 12px;">
                                                Medios Baños
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Jardín
                                            </p>
                                        </div>
                                    </div>
                                    {{-- PATIO DE SERVICIO / CUARTO DE SERVICIO / COCHERA --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            {{-- <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cama.png')}}" alt=""> --}}
                                            @if ($propiedad->house->service_yard)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            {{-- <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt=""> --}}
                                            @if ($propiedad->house->service_room)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cochera.png')}}" alt="">
                                            <b>{{ $propiedad->house->garages }}</b>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1 text-ps" style="color: #818181; font-size: 12px;">
                                                Patio de Servicio
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1 text-ps" style="color: #818181; font-size: 12px;">
                                                Cuarto de Servicio
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Cocheras
                                            </p>
                                        </div>
                                    </div>
                                    {{-- ESTUDIOS / CISTERNA / PISOS --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estudio.png')}}" alt="">
                                            <b>{{ $propiedad->house->home_office }}</b>
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cistern.png')}}" alt="">
                                            @if ($propiedad->house->cistern)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/pisos.png')}}" alt="">
                                            <b>{{ $propiedad->house->floors }}</b>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Estudios
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Cisterna
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Pisos
                                            </p>
                                        </div>
                                    </div>
                                    {{-- VIGILANCIA / ANTIGUEDAD --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/security.png')}}" alt="">
                                            @if ($propiedad->house->security_vigilance)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            {{-- <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt=""> --}}
                                            @if ($propiedad->house->antiquity < 1)
                                                <b>Nueva</b>
                                            @elseif($propiedad->house->antiquity == 1)
                                                <b>1 año</b>
                                            @else
                                                <b>{{ $propiedad->house->antiquity }} años</b> 
                                            @endif
                                        </div>
                                        <div class="col">
                                            
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Vigilancia
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Antigüedad
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                
                                            </p>
                                        </div>
                                    </div>
                                    @break
                                @case('DEPARTAMENTO')
                                    {{-- ESTADO / TIPO / ELEVADOR --}}
                                    <div class="row px-2 mt-4">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                            @if ($propiedad->deal == 'sale')
                                                <b>Venta</b>
                                            @else
                                                <b>Renta</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <b>Departamento</b>
                                        </div>
                                        <div class="col">
                                            @if ($propiedad->department->elevator)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
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
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Elevador
                                            </p>
                                        </div>
                                    </div>
                                    {{-- RECAMARAS / BAÑOS / CONSTRUCCION --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cama.png')}}" alt="">
                                            <b>{{ $propiedad->department->bedrooms }}</b>
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt="">
                                            <b>{{ $propiedad->department->bathrooms }}</b>
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                                            <b>{{ $propiedad->department->construction }} m<sup>2</sup></b>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Recámaras
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1 text-ps" style="color: #818181; font-size: 12px;">
                                                Baños completos
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Construcción
                                            </p>
                                        </div>
                                    </div>
                                    {{-- COCINAS / COCINAS INTEGRALES / COMEDORES --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            {{-- <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cama.png')}}" alt=""> --}}
                                            <b>{{ $propiedad->department->kitchens }}</b>
                                        </div>
                                        <div class="col">
                                            {{-- <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt=""> --}}
                                            @if ($propiedad->department->integral_kitchen)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/comedor.png')}}" alt="">
                                            <b>{{ $propiedad->department->dining_rooms }}</b>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Cocinas
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1 text-ps" style="color: #818181; font-size: 12px;">
                                                Cocina Integral
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Comedores
                                            </p>
                                        </div>
                                    </div>
                                    {{-- SALAS / MEDIOS BAÑOS / PATIO --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/sala.png')}}" alt="">
                                            <b>{{ $propiedad->department->living_rooms }}</b>
                                        </div>
                                        <div class="col">
                                            {{-- <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt=""> --}}
                                            <b>{{ $propiedad->department->half_bathrooms }}</b>
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/patio.png')}}" alt="">
                                            @if ($propiedad->department->yard)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Salas
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1 text-ps" style="color: #818181; font-size: 12px;">
                                                Medios Baños
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Jardín
                                            </p>
                                        </div>
                                    </div>
                                    {{-- PATIO DE SERVICIO / CUARTO DE SERVICIO / COCHERA --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            {{-- <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cama.png')}}" alt=""> --}}
                                            @if ($propiedad->department->service_yard)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            {{-- <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt=""> --}}
                                            @if ($propiedad->department->service_room)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cochera.png')}}" alt="">
                                            <b>{{ $propiedad->department->garages }}</b>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1 text-ps" style="color: #818181; font-size: 12px;">
                                                Patio de Servicio
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1 text-ps" style="color: #818181; font-size: 12px;">
                                                Cuarto de Servicio
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Cocheras
                                            </p>
                                        </div>
                                    </div>
                                    {{-- ESTUDIOS / CISTERNA / PISOS --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estudio.png')}}" alt="">
                                            <b>{{ $propiedad->department->home_office }}</b>
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cistern.png')}}" alt="">
                                            @if ($propiedad->department->cistern)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/pisos.png')}}" alt="">
                                            <b>{{ $propiedad->department->floors }}</b>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Estudios
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Cisterna
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Pisos
                                            </p>
                                        </div>
                                    </div>
                                    {{-- VIGILANCIA / ANTIGUEDAD --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/security.png')}}" alt="">
                                            @if ($propiedad->department->security_vigilance)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            {{-- <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt=""> --}}
                                            @if ($propiedad->department->antiquity < 1)
                                                <b>Nueva</b>
                                            @elseif($propiedad->department->antiquity == 1)
                                                <b>1 año</b>
                                            @else
                                                <b>{{ $propiedad->department->antiquity }} años</b> 
                                            @endif
                                        </div>
                                        <div class="col">
                                            <b>{{ $propiedad->department->floor }}</b> 
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Vigilancia
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Antigüedad
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Piso
                                            </p>
                                        </div>
                                    </div>
                                    @break
                                @case('TERRENO')
                                    {{-- ESTADO / TIPO / TERRENO --}}
                                    <div class="row px-2 mt-4">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                            @if ($propiedad->deal == 'sale')
                                                <b>Venta</b>
                                            @else
                                                <b>Renta</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <b>Terreno</b>
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/terreno2.png')}}" alt="">
                                            <b>{{ $propiedad->terrain->terrain }} m<sup>2</sup></b>
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
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Terreno
                                            </p>
                                        </div>
                                    </div>
                                    {{-- Acceso a vialidades --}}
                                    <div class="row px-2 mt-2">
                                        <div class="col">
                                            @if ($propiedad->terrain->access_roads)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            
                                        </div>
                                        <div class="col">
                                            
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1 text-ps" style="color: #818181; font-size: 12px;">
                                                Acceso a Vialidades
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                
                                            </p>
                                        </div>
                                    </div>
                                    @break
                                @case('BODEGA')
                                    {{-- ESTADO / TIPO / TERRENO --}}
                                    <div class="row px-2 mt-4">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                            @if ($propiedad->deal == 'sale')
                                                <b>Venta</b>
                                            @else
                                                <b>Renta</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <b>Bodega</b>
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/terreno2.png')}}" alt="">
                                            <b>{{ $propiedad->warehouse->terrain }} m<sup>2</sup></b>
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
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Terreno
                                            </p>
                                        </div>
                                    </div>
                                    {{-- MEDIOS BAÑOS / OFICINA / CONSTRUCCION --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            <b>{{ $propiedad->warehouse->half_bathrooms }}</b>
                                        </div>
                                        <div class="col">
                                            @if ($propiedad->warehouse->office)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                                            <b>{{ $propiedad->warehouse->construction }} m<sup>2</sup></b>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1 text-ps" style="color: #818181; font-size: 12px;">
                                                Medios Baños
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Oficina
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Construcción
                                            </p>
                                        </div>
                                    </div>
                                    @break
                                @case('OFICINA')
                                    {{-- ESTADO / TIPO / CONSTRUCCION --}}
                                    <div class="row px-2 mt-4">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                            @if ($propiedad->deal == 'sale')
                                                <b>Venta</b>
                                            @else
                                                <b>Renta</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <b>Oficina</b>
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                                            <b>{{ $propiedad->office->construction }} m<sup>2</sup></b>
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
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Construcción
                                            </p>
                                        </div>
                                    </div>
                                    {{-- MEDIOS BAÑOS / CISTERNA / ELEVADOR --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            <b>{{ $propiedad->office->half_bathrooms }}</b>
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cistern.png')}}" alt="">
                                            @if ($propiedad->office->cistern)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            @if ($propiedad->office->elevator)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1 text-ps" style="color: #818181; font-size: 12px;">
                                                Medios Baños
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Cisterna
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Elevador
                                            </p>
                                        </div>
                                    </div>
                                    {{-- VIGILANCIA / PISO /  --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/security.png')}}" alt="">
                                            @if ($propiedad->office->security_vigilance)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <b>{{$propiedad->office->floor}}</b>
                                        </div>
                                        <div class="col">
                                           
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Vigilancia
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Piso
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                
                                            </p>
                                        </div>
                                    </div>
                                    @break
                                @case('LOCAL')
                                    {{-- ESTADO / TIPO / CONSTRUCCION --}}
                                    <div class="row px-2 mt-4">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                            @if ($propiedad->deal == 'sale')
                                                <b>Venta</b>
                                            @else
                                                <b>Renta</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <b>Local</b>
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                                            <b>{{ $propiedad->office->construction }} m<sup>2</sup></b>
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
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Construcción
                                            </p>
                                        </div>
                                    </div>
                                    {{-- MEDIOS BAÑOS / CISTERNA / ELEVADOR --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            <b>{{ $propiedad->office->half_bathrooms }}</b>
                                        </div>
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cistern.png')}}" alt="">
                                            @if ($propiedad->office->cistern)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            @if ($propiedad->office->elevator)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1 text-ps" style="color: #818181; font-size: 12px;">
                                                Medios Baños
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Cisterna
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Elevador
                                            </p>
                                        </div>
                                    </div>
                                    {{-- VIGILANCIA / PISO /  --}}
                                    <div class="row px-2">
                                        <div class="col">
                                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/security.png')}}" alt="">
                                            @if ($propiedad->office->security_vigilance)
                                                <b>Sí</b>
                                            @else
                                                <b>No</b>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <b>{{$propiedad->office->floor}}</b>
                                        </div>
                                        <div class="col">
                                           
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Vigilancia
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                Piso
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                                
                                            </p>
                                        </div>
                                    </div>
                                    @break
                                @default
                                    
                            @endswitch

                            {{-- DESCRIPCION --}}
                            @if ($propiedad->description)
                            <div class="row text-justify" style="padding-right: 2rem; padding-left: 0.5rem">
                                <p class="font-weight-light pt-1 mb-2" style="color: #818181; font-size: 12px;">
                                    Descripción
                                </p>
                                <P>
                                    {{ $propiedad->description }}
                                </P>
                            </div>
                            @endif
                        </div>
                    </div>

                    <form class="Agregar-propiedades-margin-top container" id="formMI" action="{{ route('propiedad',['id'=>Crypt::encrypt($propiedad->id)]) }}" method="POST">
                        @csrf
                        {{-- FORMULARIO --}}
                        <div class="row px-4" id="formularioMI" @if ($errors->any() || app('request')->input('mi')) style="display: block" @else style="display: none" @endif>
                            <h5 class="px-2 pt-1 text-blue22" style="font-weight: 600;">
                                Información de contacto
                            </h5>
                            <p>Por favor llene los siguiente datos y en breve un asesor lo contactará.</p>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label class="text-blue22" style="font-weight: 600" for="nombre">Nombre *</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" required data-parsley-pattern="[a-zA-Z áéíóúÁÉÍÓÚ]+$" data-parsley-trigger="keyup" data-parsley-error-message="El texto introducido no es válido."  data-parsley-maxlength="255" data-parsley-maxlength-message="El nombre puede tener como máximo 255 caracteres." value="{{ old('nombre') }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-blue22" style="font-weight: 600" for="correo">Correo electrónico</label>
                                        <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo electrónico" data-parsley-type="email" data-parsley-trigger="keyup"  data-parsley-error-message="El correo electrónico introducido no es válido." value="{{ old('correo') }}">
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label class="text-blue22" style="font-weight: 600" for="telefono">Número de teléfono *</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Número de teléfono" data-parsley-debounce="500" 
                                        data-parsley-type="digits" 
                                        data-parsley-minlength="10" 
                                        data-parsley-maxlength="50"
                                        data-parsley-minlength-message="El número puede tener como mínimo 10 dígitos."
                                        data-parsley-maxlength-message="El número puede tener como máximo 50 dígitos."
                                        data-parsley-type-message="Sólo se admiten dígitos." value="{{ old('telefono') }}"
                                        required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="text-blue22" style="font-weight: 600" for="comentario">Comentarios</label>
                                        <textarea class="form-control" id="comentario" name="comentario" rows="3" placeholder="Comentarios (máximo 255 caracteres)" data-parsley-maxlength="255" data-parsley-maxlength-message="El comentario puede tener como máximo 255 caracteres." data-parsley-pattern="[a-zA-Z áéíóúÁÉÍÓÚ\,\.]+$" data-parsley-trigger="keyup">{{ old('comentario') }}</textarea>
                                    </div>
                                    {!! htmlFormSnippet() !!}
                                </div>
                            </div>
                            <div class="row">
                                <p>
                                    * Campos obligatorios       
                                </p>
                                <p class="mb-0">
                                    Al hacer clic en “Enviar” aceptas nuestros <a href="/terminos_y_condiciones">Términos y condiciones</a>, asi como el <a href="/aviso_de_privacidad">Aviso de privacidad</a>. 
                                </p>
                            </div>

                        </div>
                        <div class="row px-4 d-flex flex-row-reverse my-4">
                            <div style="width: fit-content; display: @if ($errors->any() || app('request')->input('mi')) none @else block @endif ;" id="btnMI">
                                <button type="button" class="btn btn-primary" style="background: #58AD30; border-color: #58AD30; font-weight:400" onclick="btnMI()">Me interesa</button>
                            </div>
                            <div style="width: fit-content; display: @if ($errors->any() || app('request')->input('mi')) block @else none @endif ;" id="enviarFORM">
                                <button type="submit" class="btn btn-primary" style="background: #58AD30; border-color: #58AD30; font-weight:400" id="submit">Enviar</button>
                            </div>
                            <div style="width: fit-content; display: @if ($errors->any() || app('request')->input('mi')) block @else none @endif ;" id="btnC">
                                <button type="button" class="btn btn-link btnC-b" style="color: #58AD30; text-decoration: none; font-weight:400" onclick="btnC()">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row text-right my-3">
                    <a href="{{ url()->previous() }}" style="text-decoration: none; font-weight:400; color:#22222">
                        <i class="fas fa-angle-left"></i>   
                        {{-- <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/backpage.png')}}" alt=""> --}}
                        Regresar
                    </a>
                </div>
            @endif

            @if (count($propiedades) > 0)
                {{-- AQUI VA EL CARRUSEL DE LAS PROPIEDADES --}}
                <div class="Otitle"><h1>PROPIEDADES SIMILARES</h2></div>

                <hr>
    
                <div class="owl-carousel owl-theme" id="propiedades-carousel" style="margin-bottom:3%; margin-top:3%">
                    @foreach ($propiedades as $propiedad1)
                        <div class="olw-item" style="margin:3%">
                            {{-- TARJETA DE LA PROPIEDAD --}}
                            <div class="border rounded-bottom shadow-sm bg-white">
                                <div style="height:auto; min-height: 330px; line-height: 12px !important;">
                                    {{-- IMAGEN --}}
                                    <div  style="
                                    background: url('{{ asset($propiedad1->photo)}}') no-repeat center center;
                                    background-size: cover;
                                    height:220px;">
                                        {{-- DIRECCION Y FOTOS --}}
                                        <div class="row h-100 align-items-end">
                                            <div class="col-8 text-left">
                                                <img class="d-inline mb-1 ml-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/ubicacion.png')}}" alt="">
                                                <p class="my-1 d-inline text-white" style="text-shadow: 1px 1px 3px black; font-weight: 500;">{{$propiedad1->suburb}}, {{$propiedad1->city}}</p>
                                            </div>
                                            <div class="col-4 text-right">
                                                <img class="d-inline mb-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/images.png')}}" alt="">
                                                <p class="m-1 d-inline text-white font-weight-bold" style="text-shadow: 1px 1px 3px black; font-weight: 500;">{{count($propiedad1->photos()->get()) + 1}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- DATOS --}}
                                    {{-- TITULO --}}
                                    <a href="{{route('propiedad', ['id'=>Crypt::encrypt($propiedad1->id)])}}" style="text-decoration: none">
                                        <h6 class="px-2 pt-1 text-blue22" style="font-weight: 600; min-height: 52px;"> 
                                            {{ \Illuminate\Support\Str::limit($propiedad1->title, $limit = 65, $end = '...') }}
                                        </h6>    
                                    </a>
                                    {{-- PRECIO Y CLAVE --}}
                                    <div class="row align-items-end px-2">
                                        <div class="col-7 text-left">
                                            <p class="m-1">${{number_format($propiedad1->price,2)}} </p>
                                        </div>
                                        <div class="col-5 text-right">
                                            <p class="m-1">Clave: <b>{{str_pad($propiedad1->id, 4, '0', STR_PAD_LEFT)}}</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <script>

        //OWL CAROUSEL
        $(document).ready(function(){
            $('#galeria-carousel').owlCarousel({
                margin:10,
                loop:false,
                autoWidth:true,
                items:4,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
            });

            $('#propiedades-carousel').owlCarousel({
                loop:false,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
            });

            $('#formMI').parsley();

            // $('#formMI').on('submit', function(event){
            //     event.preventDefault();

            //     if($('#formMI').parsley().isValid())
            //     {
            //         $.ajax({
            //             url: '/propiedad/{{ $propiedad->id }}',
            //             method:"POST",
            //             data:$(this).serialize(),
            //             dataType:"json",
            //             beforeSend:function()
            //             {
            //                 $('#submit').attr('disabled', 'disabled');
            //                 $('#submit').val('Submitting...');
            //             },
            //             success:function(data)
            //             {
            //                 $('#formMI')[0].reset();
            //                 $('#formMI').parsley().reset();
            //                 $('#submit').attr('disabled', false);
            //                 $('#submit').val('Submit');
            //                 alert(data.success);
            //             }
            //         });
            //     }
            // });

            $('#copiarPP').tooltip('disable');

            $('#copiarPP').click(function (e) {
                e.preventDefault();
                var copyText = $(this).data('link');

                document.addEventListener('copy', function(e) {
                    e.clipboardData.setData('text/plain', copyText);
                    e.preventDefault();
                }, true);

                document.execCommand('copy');

                console.log("Enlace copiado.");
            });
        });

        function ttCopiar(){
            var copyText = '{{ url()->current() }}';
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            $('#copiarPP').tooltip('show');
        }

        //IMAGEN GALERIA

        //pre es el elemento donde se muestra la previsualizacion de la imagen seleccionada
        //"imagen-seleccionada" es el visualizador de la imagen
        var pre = document.getElementById("imagen-seleccionada");
        //imagen es la imagen que se ha seleccionado
        var imagen = pre.style.backgroundImage;

        //controla cuando se selecciona una imagen
        function clickImagen(nuevaImagen){
            //hace que se muestre la nueva imagen en el visualizador
            pre.style.backgroundImage = "url('"+ nuevaImagen + "')";

            imagen = nuevaImagen;
        }

        //FORMULARIO
        function btnMI() {
            //APARECE EL FORMILARIO
            document.getElementById("formularioMI").style.display = "block";

            //DESAPARECE EL BOTON ME INTERESA
            document.getElementById("btnMI").style.display = "none";

            //APARECEN LOS BOTONES CANELAR Y ENVIAR
            document.getElementById("btnC").style.display = "block";
            document.getElementById("enviarFORM").style.display = "block";
        }

        function btnC(){
            //DESAPARECE EL FORMILARIO
            document.getElementById("formularioMI").style.display = "none";

            //APARECE EL BOTON ME INTERESA
            document.getElementById("btnMI").style.display = "block";

            //DESAPARECEN LOS BOTONES CANELAR Y ENVIAR
            document.getElementById("btnC").style.display = "none";
            document.getElementById("enviarFORM").style.display = "none";
        }

        window.onload = function() {
            if(@if(app('request')->input('mi')) true @else false @endif){
                document.getElementById("formMI").scrollIntoView();
            }
        };
    </script>
@endsection

@section('photoswipe')
<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
        It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                    <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>

<script>
    var pswpElement = document.querySelectorAll('.pswp')[0];

    var index = 0;

    function setIndex(i){
        index = i;
    }

    // build items array
    var openPhotoSwipe = function() {
        var items = [
            {
                src: '{{asset($propiedad->photo)}}',
                w: 0,
                h: 0
            },
            @foreach ($propiedad->photos as $photo)
            {
                src: '{{asset($photo->path)}}',
                w: 0,
                h: 0
            },
            @endforeach
        ];

        // define options (if needed)
        var options = {
            // optionName: 'option value'
            // for example:
            index: index // start at first slide
        };

        // Initializes and opens PhotoSwipe
        var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);

        gallery.listen('gettingData', function(index, item) {
            if (item.w < 1 || item.h < 1) { // unknown size
                var img = new Image(); 
                img.onload = function() { // will get size after load
                    item.w = this.width; // set image width
                    item.h = this.height; // set image height
                    gallery.invalidateCurrItems(); // reinit Items
                    gallery.updateSize(true); // reinit Items
                }
                img.src = item.src; // let's download image
            }
        });

        gallery.init();
    };

    document.getElementById('imagen-seleccionada').onclick = openPhotoSwipe;
</script>
    
@endsection