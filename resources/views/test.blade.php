@extends('layouts.publi')

@section('title')
    Inicio
@endsection

@section('barra-busqueda')
    @include('subviews.busqueda')
@endsection

@section('head')
    <link rel="stylesheet" href="{{ asset('/css/O.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/A.css') }}">
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

@endsection

@section('content')
<div style="background-image: url('/img/fondoEdificioBLUE2.png'); width: 100; height: 100vh; ">
    <div class="bocadillo-cuadrado">
        <h1 id="hola">¡BIENVENIDO!</h1> 
        <p id="txt_hi" style="font-family: Roboto;
        font-style: italic;
        font-weight: 300;
        font-size: 22px;
        line-height: 26px;
        color: #222222;"> Selecciona una opción para continuar </p>
        <div class="botonesIndex">
            <div id="btn1" onclick="opcion('next')" class="botonIndex">
                <p style="font-family: Roboto;
                font-style: normal;
                font-weight: normal;
                font-size: 16px;
                line-height: 19px;
                text-align: center;
                color:white;
                ">Quiero comprar o rentar una propiedad</p> 
            </div>
            <div id="btn2" onclick="opcion('form')" class="botonIndex">
                <p style="font-family: Roboto;
                font-style: normal;
                font-weight: normal;
                font-size: 16px;
                line-height: 19px;
                text-align: center;
                color:white;
                ">Quiero vender o rentar mi propiedad</p> 
            </div>
        </div>
        <p id="back" class="volverbtn" style="font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 19px;
        color: #363E67;
        margin:5%;
        float:left;
        display:none;
        " onclick="opcion('volver')"><i class="fas fa-chevron-left"></i>Regresar</p>
    </div>
</div>
<div>
    <h1 style="text-align: center">NOVEDADES</h1> 
    <div class="owl-carousel owl-theme" style="margin-bottom:3%; margin-top:3%">
        @foreach ($propiedades as $propiedad)
            <div class="olw-item" style="margin:3%">
                    {{-- TARJETA DE LA PROPIEDAD --}}
                    <div class="border rounded-bottom shadow-sm bg-white">
                        <div style="height:auto; min-height: 330px; line-height: 12px !important;">
                            {{-- IMAGEN --}}
                            <div  style="
                            background: url('{{ asset($propiedad->photo)}}') no-repeat center center;
                            background-size: cover;
                            height:220px;">
                                {{-- DIRECCION Y FOTOS --}}
                                <div class="row h-100 align-items-end">
                                    <div class="col-8 text-left">
                                        <img class="d-inline mb-1 ml-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/ubicacion.png')}}" alt="">
                                        <p class="my-1 d-inline text-white" style="text-shadow: 1px 1px 3px black; font-weight: 500;">{{$propiedad->suburb}}, {{$propiedad->city}}</p>
                                    </div>
                                    <div class="col-4 text-right">
                                        <img class="d-inline mb-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/images.png')}}" alt="">
                                        <p class="m-1 d-inline text-white font-weight-bold" style="text-shadow: 1px 1px 3px black; font-weight: 500;">{{count($propiedad->photos()->get())}}</p>
                                    </div>
                                </div>
                            </div>
                            {{-- DATOS --}}
                            {{-- TITULO --}}
                            <a href="{{route('propiedad', ['id'=>$propiedad->id])}}" style="text-decoration: none">
                                <h6 class="px-2 pt-1 text-blue22" style="font-weight: 600;"> 
                                    {{ \Illuminate\Support\Str::limit($propiedad->description, $limit = 65, $end = '...') }}
                                </h6>    
                            </a>
                            {{-- PRECIO Y CLAVE --}}
                            <div class="row align-items-end px-2">
                                <div class="col-7 text-left">
                                    <p class="m-1">${{number_format($propiedad->price,2)}} </p>
                                </div>
                                <div class="col-5 text-right">
                                    <p class="m-1">Clave: <b>{{str_pad($propiedad->id, 4, '0', STR_PAD_LEFT)}}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    $('.owl-carousel').owlCarousel({
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
            items:5
        }
    }
    });
    function opcion(option){
        switch(option){
            case "form":
                location.href="/contactanos";
            break;
            case "next":
                btn1=document.getElementById("btn1");
                btn2=document.getElementById("btn2");
                btn1.innerHTML="Comprar";
                btn2.innerHTML="Rentar";
                document.getElementById("hola").innerHTML="¡CASI LISTOS!";
                document.getElementById("txt_hi").innerHTML="Me interesa...";
                btn1.setAttribute("onclick", "opcion('comprar')");
                btn2.setAttribute("onclick", "opcion('rentar')");
                document.getElementById("back").style.display="block";
            break;
            case 'rentar':
                location.href="/propiedades?deal=rent";
            break;
            case 'comprar':
                location.href="/propiedades?deal=sale";
            break;
            case 'volver':
            btn1=document.getElementById("btn1");
                btn2=document.getElementById("btn2");
                btn1.innerHTML="Quiero comprar o rentar una propiedad";
                btn2.innerHTML="Quiero vender o rentar mi propiedad";
                document.getElementById("hola").innerHTML="¡BIENVENIDO!";
                document.getElementById("txt_hi").innerHTML="Selecciona una opción para continuar";
                btn1.setAttribute("onclick", "opcion('next')");
                btn2.setAttribute("onclick", "opcion('form')");
                document.getElementById("back").style.display="none";
            break;       
        }
    }
</script>
@endsection
