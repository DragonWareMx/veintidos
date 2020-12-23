@extends('layouts.login')

@section('title')
Reestablecer contraseña
@endsection

@section('left-title')
Reestablecer Contraseña
@endsection

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<p class="iniciar-sesion right" style="color: #FFFFFF">
    Reestablecer contraseña
</p>
<form class="form-signin" method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <label class="text-login mt-2">Correo</label>
    <input type="email" id="email" class="form-control trial-input" placeholder="correo@ejemplo.com" name="email"
        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
    <label class="text-login mt-4">Contraseña</label>
    <input type="password" id="password" class="form-control trial-input" name="password" required
        autocomplete="new-password">
    <label class="text-login mt-4">Confirmar contraseña</label>
    <input type="password" id="password-confirm" class="form-control trial-input" name="password_confirmation" required
        autocomplete="new-password">
    @error('password')
    <span class="error-login my-2" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    @error('email')
    <span class="error-login my-2" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <button class="btn btn-custom w-100 mt-3">Reestablecer contraseña</button>
</form>
@endsection