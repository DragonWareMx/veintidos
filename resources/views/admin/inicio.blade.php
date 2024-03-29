@extends('layouts.admin')

@section('title')
Inicio - Veintidós
@endsection

@section('head')
<link rel="stylesheet" href="{{ asset('/css/sideBar.css') }}">
@endsection

@section('navbar')
<div class="navbar-brand" href="#">
  Inicio
</div>
@endsection

@section('content')
<div class="card cardAdmin">
  @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  @endif
  <div class="card-body">
    <h1 style="color:#222222">Bienvenido de nuevo</h1>
    <p class="txt-resumen">Resumen</p>
    <p class="txt-resumen txt-totalP">Total de propiedades: {{$propiedades}}</p>
    <div class="div-rowP">
      <a href="/admin/propiedades?tipo=casas" class="a-rowP2"><img src="{{ asset('img/ico/casa2.png')}}" alt="">Casas<div>({{$casas}})</div></a>
      <a href="/admin/propiedades?tipo=departamentos" class="a-rowP2"><img src="{{ asset('img/ico/departamentos.png')}}" alt="">Departamentos<div>({{$departamentos}})</div></a>
      <a href="/admin/propiedades?tipo=locales" class="a-rowP2"><img src="{{ asset('img/ico/local.png')}}" alt="">Locales<div>({{$locales}})</div></a>
      <a href="/admin/propiedades?tipo=oficinas" class="a-rowP2"><img src="{{ asset('img/ico/oficina.png')}}" alt="">Oficinas<div>({{$oficinas}})</div></a>
      <a href="/admin/propiedades?tipo=terrenos" class="a-rowP2"><img src="{{ asset('img/ico/terreno.png')}}" alt="">Terrenos<div>({{$terrenos}})</div></a>
      <a href="/admin/propiedades?tipo=bodegas" class="a-rowP2"><img src="{{ asset('img/ico/bodega.png')}}" alt="">Bodegas<div>({{$bodegas}})</div></a>
    </div>
    <div class="div-cerrar-sesion">
      <a href="#" class="a-cerrar-sesion" data-bs-toggle="modal" data-bs-target="#cerrar-sesion">Cerrar sesión<img
          src="{{ asset('img/sistema/logout.png')}}" style="width: 15px; margin-left:10px; margin-bottom:2px"
          alt=""></a>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cerrar-sesion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quiere salir?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="font-weight: 400; color:#8c8d8f">
        Selecciona "Cerrar sesión" si está listo para salir del sistema.
      </div>
      <div class="modal-footer">
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
            style="font-size: 15px">Cancelar</button>
            <form action="{{route('logout')}}" method="POST">
              {{csrf_field()}}
          <button type="submit" class="btn btn-success" style="font-size: 15px">Cerrar sesión</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection