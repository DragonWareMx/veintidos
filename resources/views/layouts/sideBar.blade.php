<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/sideBar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/ba2b187421.js" crossorigin="anonymous"></script>
</head>
<body style="">
    <div class="container_sideBar">
        <div class="sideBar_left">
            <div class="sideBar_menu"> 
                <div class="sideBar_title">¿QUÉ BUSCAS?</div>
                <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="img/ico/casa2.png" alt="">Casas</a>
                <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="img/ico/terreno.png" alt="">Terrenos</a>
                <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="img/ico/bodega.png" alt="">Bodegas</a>
                <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="img/ico/local.png" alt="">Locales</a>
                <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="img/ico/edificios.png" alt="">Edificios</a>
                <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="img/ico/departamentos.png" alt="">Departamentos</a>
                <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="img/ico/oficina.png" alt="">Oficinas</a>
                <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="img/ico/consultorio.png" alt="">Consultorios</a>
                <a href="#" class="sideBar_li"><img class="sideBar_li_image" src="img/ico/rancho.png" alt="">Ranchos</a>
                <div class="sideBar_title">CONTACTO</div>
                <img class="sideBar_logo" src="img/logos/transparente-cut.png" alt="">
                <div class="sideBar_textA">¿Quieres vender o rentar tu propiedad?</div>
                <a class="sideBar_link" href="#">Clic aquí</a>
                <div class="sideBar_textB">Tel. 4433370550</div>
                <div class="sideBar_textB">contacto@veintidos.mx</div>
            </div>
        </div>
        <div class="sideBar_right">
            @yield('content2')
        </div>
    </div>
</body>
</html>