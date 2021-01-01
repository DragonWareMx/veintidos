<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/ba2b187421.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('img/logos/favicon.png') }}">
    <title>@yield('title')</title>
    @yield('head')
</head>
<body style="">
    <!-- ***** Preloader Start ***** -->
    <style>
        /* 
---------------------------------------------
preloader
--------------------------------------------- 
*/
        #preloader {
        overflow: hidden;
        background-image: linear-gradient(145deg, #313d7c 0%, #222B58 100%);
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        position: fixed;
        z-index: 9999;
        color: #fff;
        }

        #preloader .jumper {
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        display: block;
        position: absolute;
        margin: auto;
        width: 50px;
        height: 50px;
        }

        #preloader .jumper > div {
        background-color: #fff;
        width: 10px;
        height: 10px;
        border-radius: 100%;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        position: absolute;
        opacity: 0;
        width: 50px;
        height: 50px;
        -webkit-animation: jumper 1s 0s linear infinite;
        animation: jumper 1s 0s linear infinite;
        }

        #preloader .jumper > div:nth-child(2) {
        -webkit-animation-delay: 0.33333s;
        animation-delay: 0.33333s;
        }

        #preloader .jumper > div:nth-child(3) {
        -webkit-animation-delay: 0.66666s;
        animation-delay: 0.66666s;
        }

        @-webkit-keyframes jumper {
        0% {
            opacity: 0;
            -webkit-transform: scale(0);
            transform: scale(0);
        }
        5% {
            opacity: 1;
        }
        100% {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 0;
        }
        }

        @keyframes jumper {
        0% {
            opacity: 0;
            -webkit-transform: scale(0);
            transform: scale(0);
        }
        5% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
        }
        </style>
        <script>
        // Page loading animation
        $(window).on('load', function () {
        if ($('.cover').length) {
            $('.cover').parallax({
                imageSrc: $('.cover').data('image'),
                zIndex: '1'
            });
        }

        $("#preloader").animate({
            'opacity': '0'
        }, 600, function () {
            setTimeout(function () {
                $("#preloader").css("visibility", "hidden").fadeOut();
            }, 300);
        });
        });
        </script>
        <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
        </div>

<!-- ***** Preloader End ***** -->
    <header class="header {{ Request::url() == route('inicio') ? '' : 'dark' }}">
        <div class="container logo-nav-container">
            <a href="{{route('inicio')}}" class="logo azul"><img src="{{ asset('/img/logos/transparente-cut.png') }}"></a>
            <a href="{{route('inicio')}}" class="logo blanco"><img src="{{ asset('/img/logos/transparenteBlanco.png') }}"></a>
            <span class="menu-icon azul"><img src="{{ asset('/img/ico/menu2-dark.png') }}"></span>
            <span class="menu-icon blanco"><img src="{{ asset('/img/ico/menu2-white.png') }}"></span>
            <nav class="navigation">
                <ul>
                    <li><a href="{{route('inicio')}}">INICIO</a></li>
                    <li><a href="{{route('verPropiedades')}}">PROPIEDADES</a></li>
                    <li><a href="{{route('quienesSomos')}}">¿QUIÉNES SOMOS?</a></li>
                    <li><a href="{{ route('contactanos') }}">CONTÁCTANOS</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main">
            @yield('content')
    </main>

    @yield('photoswipe')

    @include('subviews.footer')
</body>
</html>