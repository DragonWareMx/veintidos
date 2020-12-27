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

<script>
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
