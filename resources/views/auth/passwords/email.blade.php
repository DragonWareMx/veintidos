@extends('layouts.login')

@section('title')
Recuperar contraseña
@endsection

@section('left-title')
Recuperar Contraseña
@endsection

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<p class="iniciar-sesion right" style="color: #FFFFFF">
    Recuperar contraseña
</p>
<form class="form-signin" method="POST" action="{{ route('password.email') }}">
    @csrf
    <label class="text-login mt-2">Correo</label>
    <input type="email" id="email" class="form-control trial-input" placeholder="correo@ejemplo.com" name="email"
        value="{{ old('email') }}" required autocomplete="email" autofocus>
    @error('email')
    <span class="error-login my-2" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <a class="olvidaste-text my-2" href="{{ route('login') }}">Iniciar sesión</a>
    <button class="btn btn-custom w-100 mt-3">Recuperar contraseña</button>
</form>
@endsection