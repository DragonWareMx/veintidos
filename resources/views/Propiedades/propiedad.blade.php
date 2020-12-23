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
    
    <style>
        .owl-w{
            width: 95%;
        }
        .pswp {
            z-index: 99999;
        }
    </style>

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
    
@endsection
@section('content')
    <div class="container">
        <div class="Odiv100 d-block">
            @if($propiedad)

                {{-- NOS SIRVE PARA SABER QUÉ TIPO DE PROPIEDAD ES--}}
                @php
                    $tipo;
                @endphp

                @if ($propiedad->house()->exists())
                    @php
                        $tipo = 'CASA';
                    @endphp
                @elseif ($propiedad->department()->exists())
                    @php
                        $tipo = 'DEPARTAMENTO';
                    @endphp
                @elseif ($propiedad->terrain()->exists())
                    @php
                        $tipo = 'TERRENO';
                    @endphp
                @elseif ($propiedad->warehouse()->exists())
                    @php
                        $tipo = 'ALMACÉN';
                    @endphp
                @elseif ($propiedad->office()->exists())
                    @php
                        $tipo = 'OFICINA';
                    @endphp
                @endif

                <div class="Otitle"><h1>PROPIEDADES | </h1><h2>{{ $tipo }}</h2></div>

                <div class="border rounded-bottom shadow bg-white mt-4">
                    <div class="row mt-4">
                        {{-- AQUI VA LA GALERIA DE FOTOS --}}
                        <div class="col-xl">
                                <div class="w-100 h-100">
                                    {{-- IMAGEN SELECCIONADA --}}
                                    <div id="imagen-seleccionada" class="mx-auto" style="height: 400px; width: 95%; background: url('{{ asset($propiedad->photo) }}') no-repeat center center; background-size: cover;">
                                    </div>

                                    {{-- Carousel --}}
                                    <div class="mx-auto mt-2" style="width: 95%;">
                                        <div class="owl-carousel owl-theme mx-auto owl-w">
                                            <div class="item" style="width:110px; height:80px; background: url('{{ asset($propiedad->photo) }}') no-repeat center center; background-size: cover;" onclick="clickImagen('{{ asset($propiedad->photo) }}'); setIndex(0)"></div>
                                            @php
                                                $index = 0;
                                            @endphp
                                            @foreach ($propiedad->photos as $photo)
                                                @php
                                                    $index++;
                                                @endphp
                                                <div class="item" style="width:110px; height:80px; background: url('{{ asset($photo->path) }}') no-repeat center center; background-size: cover;" onclick="clickImagen('{{ asset($photo->path) }}'); setIndex({{ $index }})"></div>
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
                            <div class="row align-items-end" style="padding-right: 2rem; padding-left: 0.5rem">
                                <div class="col-7 text-left">
                                    <p class="m-1" style="font-weight: 600; font-size: 24px;">${{ number_format($propiedad->price, 2) }}</p>
                                </div>
                                <div class="col-5 text-right d-flex justify-content-between">
                                    <p class="m-1">Clave: <b>{{ $propiedad->id }}</b></p>
                                    <img class="ml-auto" style="width:17px; height:17px; " src="{{ asset('img/ico/share.png')}}" alt="">
                                </div>
                            </div>

                            {{-- UBICACION --}}
                            <div class="row" style="padding-right: 2rem; padding-left: 0.5rem">
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
                                    {{-- COCINAS / COCINAS INTEGRALES / COMEDORES --}}
                                    {{-- SALAS / MEDIOS BAÑOS / PATIO --}}
                                    {{-- PATIO DE SERVICIO / CUARTO DE SERVICIO / COCHERA --}}
                                    {{-- ESTUDIOS / CISTERNA / PISOS --}}
                                    {{-- VIGILANCIA / ANTIGUEDAD --}}
                                    @break
                                @case('DEPARTAMENTO')
                                    
                                    @break
                                @case('TERRENO')
                                    
                                    @break
                                @case('ALMACÉN')
                                    
                                    @break
                                @case('OFICINA')
                                    
                                    @break
                                @default
                                    
                            @endswitch

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
            @endif

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
        //hace que se muestre la nueva imagen en el visualizador
        pre.style.backgroundImage = "url('"+ nuevaImagen + "')";

        imagen = nuevaImagen;
    }
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
                src: '{{asset("/")}}{{ $propiedad->photo }}',
                w: 0,
                h: 0
            },
            @foreach ($propiedad->photos as $photo)
                {
                    src: '{{asset("/")}}{{ $photo->path }}',
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