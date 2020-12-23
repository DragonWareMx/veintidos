<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/logos/favicon.png') }}">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
</head>

<body>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12 col-xl-10 mx-auto d-flex flex-column">
                <div class="card card-signin flex-row my-auto" style="background-color: transparent">
                    <div class="card-img-left d-none d-md-flex" style="background-color: transparent">
                        <div class="vilecard">
                            <p class="iniciar-sesion mt-5">@yield('left-title')</p>
                            <p class="slogan my-3"> Slogan Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            <p class="copyright mb-0 mt-auto">Copyright © 2020 Veintidós.</p>
                        </div>
                    </div>
                    <div class="card-body card-login px-5 ">
                        <div class="col-md-10 col-12">
                            <img src="{{ asset('img/logos/transparenteBlanco.png') }}" alt="" class="mb-3">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>