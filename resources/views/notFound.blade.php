@extends('layouts.publi')
@section('title')
    Sin Resultados
@endsection
@section('head')
    <link rel="stylesheet" href="{{ asset('/css/O.css') }}">
@endsection
@section('content')
    <div class="Odiv100">
        <div class="Otitle"><h1>PROPIEDADES | </h1><h2>CASAS</h2></div>
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
    </div>
@endsection