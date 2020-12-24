<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="https://kit.fontawesome.com/ba2b187421.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/O.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin_style.css') }}">
    <link rel="icon" href="{{ asset('img/logos/favicon.png') }}">
    <title>@yield('title')</title>
    @yield('head')
</head>

<body style="">
    <nav class="navbar fixed-top navbar-dark bg-veintidos px-3">
        {{-- <div class="navbar-brand" href="#">
            Inicio
        </div> --}}
        @yield('navbar')
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logos/transparenteBlanco.png') }}" height="30" class="d-inline-block align-top"
                alt="">
        </a>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <nav class="navbar fixed-bottom navbar-light bg-light px-3 justify-content-center border-veintidos overflow-admin">
        <a class="link-veintidos d-flex flex-wrap justify-content-center mx-5" href="{{route('adminIndex')}}" style="width:40px">
            <img src="{{ asset('img/sistema/inicio.png') }}" alt="" width="20" height="20">
            Inicio
        </a>
        <a class="link-veintidos d-flex flex-wrap justify-content-center mx-5" href="{{route('cuenta')}}" style="width:40px">
            <img src="{{ asset('img/sistema/cuenta.png') }}" alt="" width="20" height="20">
            Cuenta
        </a>
        <a class="link-veintidos d-flex flex-wrap justify-content-center mx-5" href="#" style="width:40px">
            <img src="{{ asset('img/sistema/inmuebles.png') }}" alt="" width="20" height="20">
            Propiedades
        </a>
        <a class="link-veintidos d-flex flex-wrap justify-content-center mx-5" href="#" style="width:40px">
            <img src="{{ asset('img/sistema/mensajes.png') }}" alt="" width="20" height="20">
            Mensajes
        </a>
        <a class="link-veintidos d-flex flex-wrap justify-content-center mx-5" href="#" style="width:40px">
            <img src="{{ asset('img/sistema/solicitudes.png') }}" alt="" width="20" height="20">
            Solicitudes
        </a>
    </nav>
</body>

</html>