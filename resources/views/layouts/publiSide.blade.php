<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/sideBar.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/sideBar.js') }}"></script>
    <script src="https://kit.fontawesome.com/ba2b187421.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    @yield('head')
</head>
<body style="">
    <header class="header {{ Request::url() == route('inicio') ? '' : 'dark' }}">
        <div class="container logo-nav-container">
            <a href="" class="logo azul"><img src="{{ asset('/img/logos/transparente-cut.png') }}"></a>
            <a href="" class="logo blanco"><img src="{{ asset('/img/logos/transparenteBlanco.png') }}"></a>
            <span class="menu-icon azul"><img src="{{ asset('/img/ico/menu2-dark.png') }}"></span>
            <span class="menu-icon blanco"><img src="{{ asset('/img/ico/menu2-white.png') }}"></span>
            <nav class="navigation">
                <ul>
                    <li><a href="#">INICIO</a></li>
                    <li><a href="#">PROPIEDADES</a></li>
                    <li><a href="#">¿QUIÉNES SOMOS?</a></li>
                    <li><a href="#">CONTÁCTANOS</a></li>
                </ul>
            </nav>
        </div>
    </header>
    @include('subviews.busqueda')
    <main class="main" style="background-color: #F8F8F8;">
        <div class="container">
            <div class="container_sideBar">
                <div class="sideBar_right">
                    @yield('content')
                </div>
                <div class="sideBar_left show">
                    <div class="sideBar_menu"> 
                        <div class="sideBar_title">¿QUÉ BUSCAS?</div>
                        <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="{{ asset('img/ico/casa2.png')}}" alt="">Casas<div class="sideBar_li_num">(578)</div></a>
                        <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="{{ asset('img/ico/departamentos.png')}}" alt="">Departamentos<div class="sideBar_li_num">(1599)</div></a>
                        <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="{{ asset('img/ico/local.png')}}" alt="">Locales<div class="sideBar_li_num">(34)</div></a>
                        <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="{{ asset('img/ico/oficina.png')}}" alt="">Oficinas<div class="sideBar_li_num">(6)</div></a>
                        <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="{{ asset('img/ico/terreno.png')}}" alt="">Terrenos<div class="sideBar_li_num">(42)</div></a>
                        <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="{{ asset('img/ico/bodega.png')}}" alt="">Bodegas<div class="sideBar_li_num">(8)</div></a>
                        {{-- <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="{{ asset('img/ico/edificios.png')}}" alt="">Edificios<div class="sideBar_li_num">(322)</div></a>
                        <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="{{ asset('img/ico/consultorio.png')}}" alt="">Consultorios<div class="sideBar_li_num">(205)</div></a>
                        <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="{{ asset('img/ico/rancho.png')}}" alt="">Ranchos<div class="sideBar_li_num">(17)</div></a> --}}
                        <div class="sideBar_title">CONTACTO</div>
                        <img class="sideBar_logo" src="{{ asset('img/logos/transparente-cut.png')}}" alt="">
                        <div class="sideBar_textA">¿Quieres vender o rentar tu propiedad?</div>
                        <a class="sideBar_link" href="#">Clic aquí</a>
                        <div class="sideBar_textB">Tel. 4433370550</div>
                        <div class="sideBar_textB">contacto@veintidos.mx</div>
                    </div>
                    <button class="sideBar_button"><img src="{{ asset('img/ico/menu-white-v.png')}}" alt=""></button> 
                </div>
            </div>
        </div>
    </main>

    @include('subviews.footer')
</body>
</html>