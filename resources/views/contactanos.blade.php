@extends('layouts.publiSide')
@section('title')
    Contáctanos
@endsection
@section('head')
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/contactanos.css') }}">
@endsection
@section('content')
<div class="container">
    <h1 class="h1 text-center">CONTÁCTANOS</h1>
</div>

<section class="contactanos">
    <div class="div_banner container-fluid">
        <img src="/img/whiteHouse.jpg" class="float-start">
        <img src="/img/salaGris.jpg" class="float-end">
        <div class="div_contactUs" style="max-width: 858px">
            <p class="text-center txt-aboutHideNot">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
            <div class="containerInfo">
                <div class="div_info1 text-start">
                    <p class="p-b"><a href="#"><i class="fas fa-phone-alt"></i>Télefono</a></p>
                    <p>4433370550</p>
                    <p class="p-b"><a href="#"><i class="fas fa-map-marker-alt"></i>Ubicación</a></p>
                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                    <p class="p-b "><a href="#"><i class="fas fa-envelope"></i>Correo electrónico</a></p>
                    <p>contacto@veintidos.mx</p>
                </div>
                <div class="div_info1 text-center">
                    <p class="text-start p-b">Síguenos</p>
                    <p class="text-start"><a href="#"><i class="fab fa-facebook-f"></i>Facebook @Veintidós</a></p>
                    <p class="text-start"><a href="#"><i class="fab fa-instagram"></i>Instagram @Veintidós</a></p>
                </div>
            </div>   
        </div>
    </div>

<div class="div_100_contactanos">
    <div class="containerForm">
        <div class="div_FormContactUs">
            <p class="text-start w-75 txt-tituloForm">¿TE INTERESA VENDER O RENTAR TU PROPIEDAD?, <b>CONTÁCTANOS</b></p>
            <p class="text-start txt-tituloForm2">Información de contacto y de la propiedad</p>
            <p class="text-start fs-6">Favor de llenar los siguiente datos y un asesor en breve le contactará. </p>
            <form class="row g-3">
                <div class="col-md-6">
                  <label for="inputName" class="form-label">Nombre *</label>
                  <input type="text" class="form-control" id="inputName" placeholder="Nombre completo">
                </div>
                <div class="col-md-6">
                  <label for="inputPhone" class="form-label">Teléfono</label>
                  <input type="phone" class="form-control" id="inputPhone" placeholder="Teléfono">
                </div>

                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="correo@ejemplo.com">
                </div>
                <div class="col-md-6">
                    <label for="inputType" class="form-label">Tipo de propiedad *</label>
                    <input type="text" class="form-control" id="inputType" placeholder="Tipo de propiedad">
                </div>

                <div class="col-md-6">
                    <label for="inputCost" class="form-label">Renta / Venta *</label>
                    <input type="text" class="form-control" id="inputCost" placeholder="Renta / Venta">
                </div>
                <div class="col-md-6">
                    <label for="inputCost" class="form-label">Precio propuesto *</label>
                    <input type="number" class="form-control" id="inputCost" placeholder="Precio propuesto (Por mes)">
                </div>

                <div class="col-md-6">
                    <label for="inputAdress" class="form-label">Dirección *</label>
                    <input type="text" class="form-control" id="inputAdress" placeholder="Dirección completa">
                </div>

            </form>
            <div class="div_btns float-end div_ajustar_btns">
                <a href="#" class="btn-txt-only">Cancelar</a>
                <button type="button" class="btn btn-primary">Enviar</button>
            </div>
            <p class="txt-footerContactUs">* Campos obligatorios</p>
            <p class="txt-footerContactUs">Al hacer clic en "Enviar" aceptas nuestros <a href="#">Términos y condiciones</a>, así como el <a href="#">Aviso de privacidad</a>.</p>

        </div>
        <div class="div_FormImg">
            <img src="/img/contact.jpg">
        </div>
    </div>
</div>
@endsection



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/contactanos.css') }}">
    <title>Contáctanos</title>
</head>
<body>
    <div class="container">
        <h1>CONTÁCTANOS</h1>
        <div class="div_banner">
            <img src="/img/cocina.jpg" style="width:200px" class="rounded float-start" alt="...">
        </div>
        
    </div>
</body>
</html> --}}