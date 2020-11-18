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
    <title>@yield('title')</title>
    @yield('head')
</head>
<body style="">
    <header class="header">
        <div class="container logo-nav-container">
            <a href="" class="logo"><img src="{{ asset('/img/logos/transparente-cut.png') }}"></a>
            <span class="menu-icon"><img src="{{ asset('/img/ico/menu2-dark.png') }}"></span>
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
    <main class="main">
        <div class="container">
            @yield('content')
        </div>
    </main>

    @include('subviews.footer')
</body>
</html>