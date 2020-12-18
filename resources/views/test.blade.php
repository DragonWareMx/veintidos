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
    </style>
@endsection

@section('content')
<div style="background-image: url('/img/fondoEdificioBLUE2.png'); width: 100; height: 100vh; ">
    <div class="bocadillo-cuadrado">
        <h1>¡BIENVENIDO!</h1> 
        <p style="font-family: Roboto;
        font-style: italic;
        font-weight: 300;
        font-size: 22px;
        line-height: 26px;
        color: #222222;"> Selecciona una opción para continuar </p>
        <div class="botonesIndex">
            <div class=botonIndex>
                <p style="font-family: Roboto;
                font-style: normal;
                font-weight: normal;
                font-size: 16px;
                line-height: 19px;
                text-align: center;
                color:white;
                ">Quiero comprar o rentar una propiedad</p> 
            </div>
            <div class=botonIndex>
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

    </div>
</div>
@endsection
