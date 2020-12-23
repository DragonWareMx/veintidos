@extends('layouts.login')

@section('title')
Iniciar Sesión
@endsection

@section('left-title')
Iniciar Sesión
@endsection

@section('content')
<p class="iniciar-sesion right" style="color: #FFFFFF">
    Iniciar Sesión
</p>
<form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
    <label class="text-login mt-2">Correo</label>
    <input type="email" id="email" class="form-control trial-input" placeholder="correo@ejemplo.com" name="email"
        value="{{ old('email') }}" required autocomplete="email" autofocus>
    <label class="text-login mt-4">Contraseña</label>
    <input type="password" id="password" class="form-control trial-input" name="password" required
        autocomplete="current-password">
    @error('email')
    <span class="error-login my-2" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    @error('password')
    <span class="error-login my" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <a class="olvidaste-text my-2" href="{{ route('password.request') }}">¿Olvidaste tu
        contraseña?</a>
    <button class="btn btn-custom w-100 mt-3">Iniciar sesión</button>
</form>
@endsection