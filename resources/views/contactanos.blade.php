@extends('layouts.publiSide')
@section('title')
    Contáctanos
@endsection
@section('head')
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/O.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/contactanos.css') }}">

    {!! htmlScriptTagJsApi([ "lang" => "es" ]) !!}
@endsection
@section('content')
<div class="container">
    <div class="Odiv100 d-block" style="margin-bottom: 25px">
        <div class="Otitle"><h1>CONTÁCTANOS</h1></div>
    </div>
</div>
<section class="contactanos">
    <div class="div_banner container-fluid">
        <img src="/img/whiteHouse.jpg" class="float-start">
        <img src="/img/salaGris.jpg" class="float-end">
        <div class="div_contactUs" style="max-width: 858px">
            <p class="text-center txt-aboutHideNot">Si necesitas asistencia o tienes alguna pregunta, contáctanos. Estamos para brindarte la mejor alternativa.</p>
            <div class="containerInfo">
                <div class="div_info1 text-start"> 
                    <p class="p-b"><a href="tel:4433370550" ><i class="fas fa-phone-alt"></i>Télefono</a></p>
                    <p>4433370550</p>
                    <p class="p-b"><a href="http://maps.google.com/?q=Leona Vicario No. 62,Col. Centro C.P. 58000,Morelia, Michoacán" target="_blank"><i class="fas fa-map-marker-alt"></i>Ubicación</a></p>
                    <p>Leona Vicario No. 62,
                        Col. Centro C.P. 58000,
                        Morelia, Michoacán</p>
                    <p class="p-b "><a href="mailto:contacto@veintidos.mx"><i class="fas fa-envelope"></i>Correo electrónico</a></p>
                    <p>contacto@veintidos.mx</p>
                </div>
                <div class="div_info1 text-center">
                    <p class="text-start p-b">Síguenos</p>
                    <p class="text-start"><a href="https://www.facebook.com/Veintid%C3%B3s-Grupo-Inmobiliario-103029468239947/" target="_blank"><i class="fab fa-facebook-f"></i>Facebook @Veintidós</a></p>
                    <p class="text-start"><a href="https://www.instagram.com/veintidosgrupoinmobiliario/" target="_blank"><i class="fab fa-instagram"></i>Instagram @Veintidós</a></p>
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
            @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
            @endif
            <form class="row g-3" method="POST" action="{{ route('contactanos-mssg')}}" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-6">
                  <label for="inputName" class="form-label">Nombre *</label>
                  <input type="text" class="form-control" id="inputName" required name="nombre" placeholder="Nombre completo" value="{{ old('nombre') }}">
                </div>
                <div class="col-md-6">
                  <label for="inputPhone" class="form-label">Teléfono *</label>
                  <input type="phone" class="form-control" id="inputPhone" required name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}">
                </div> 

                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="inputEmail" name="correo" placeholder="correo@ejemplo.com" value="{{ old('correo') }}">
                </div>
                <div class="col-md-6">
                    <label for="inputType" class="form-label">Tipo de propiedad *</label>
                    <select class="form-control" id="inputType" required name="tipo" placeholder="Tipo de propiedad" value="{{ old('tipo') }}">
                        <option value="warehouse">Bodega</option>
                        <option selected value="house">Casa</option>
                        <option value="department">Departamento</option>
                        <option value="premises">Local</option>
                        <option value="office">Oficina</option>
                        <option value="terrain">Terreno</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="inputCost" class="form-label">Renta / Venta *</label>
                    <select class="form-control" id="inputCost" required name="deal" placeholder="Renta / Venta" value="{{ old('deal') }}">
                        <option selected value="rent">Renta</option>
                        <option value="sale">Venta</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputCost" class="form-label">Precio propuesto *</label>
                    <input type="number" min="1" class="form-control" id="inputCost" required name="precio" placeholder="Precio propuesto (Por mes)" value="{{ old('precio') }}">
                </div>

                {!! htmlFormSnippet() !!}

                

            
            <div class="div_btns float-end div_ajustar_btns">
                <a href="#" class="btn-txt-only">Cancelar</a>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
            <p class="txt-footerContactUs">* Campos obligatorios</p>
            <p class="txt-footerContactUs">Al hacer clic en "Enviar" aceptas nuestros <a href="/terminos_y_condiciones" target="_blank">Términos y condiciones</a>, así como el <a href="/aviso_de_privacidad" target="_blank">Aviso de privacidad</a>.</p>

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