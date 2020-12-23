<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                            <p class="iniciar-sesion mt-5">Iniciar Sesión</p>
                            <p class="slogan my-3"> Slogan Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            <p class="copyright mb-0 mt-auto">Copyright © 2020 Veintidós.</p>
                        </div>
                    </div>
                    <div class="card-body card-login px-5 ">
                        <div class="col-md-10 col-12">
                            <img src="{{ asset('img/logos/transparenteBlanco.png') }}" alt="">
                            @yield('content')
                            <form class="form-signin" method="POST" action="{{ route('login') }}">
                                @csrf
                                <label class="text-login mt-5">Correo</label>
                                <input type="email" id="email" class="form-control trial-input"
                                    placeholder="correo@ejemplo.com" name="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label class="text-login mt-4">Contraseña</label>
                                <input type="password" id="password" class="form-control trial-input" name="password"
                                    required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <a class="olvidaste-text my-2" href="{{ route('password.request') }}">¿Olvidaste tu
                                    contraseña?</a>
                                <button class="btn btn-custom w-100 mt-3">Iniciar sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>