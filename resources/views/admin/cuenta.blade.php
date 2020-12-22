@extends('layouts.admin')

@section('title')
Cuenta - Veintidós
@endsection

@section('head')
<link rel="stylesheet" href="{{ asset('/css/sideBar.css') }}">
<script languague="javascript">
  function editar() {
      txt = document.getElementById('txt-editarC');
      div = document.getElementById('div-datos-pssw');
      txt.style.display = 'none';
      div.style.display = 'block';
  }
  function cerrar() {
      div = document.getElementById('div-datos-pssw');
      div.style.display = 'none';
  }
</script>
@endsection

@section('navbar')
<a class="navbar-brand" onclick="history.go(-1)" style="cursor: pointer">
  <img src="{{ asset('img/sistema/backwhite.png') }}" alt="" style="height:23px;width:23px">
  &nbsp; Cuenta
</a>
@endsection

@section('content')
<div class="card cardAdmin">
  <div class="card-body">
    <div class="div-info-cuenta">
      <div class="div-foto-cuenta">
        <img src="{{ asset('img/sistema/userphoto.png')}}" alt="">
        <div><a href="javascript:cerrar();" class="a-cerrar-sesion" data-bs-toggle="modal"
            data-bs-target="#editar-datos">Editar datos<img src="{{ asset('img/sistema/edit.png')}}"
              style="height:12px; width: 13px; margin-left:10px; margin-bottom:2px" alt=""></a></div>
      </div>
      <div class="div-content-info">
        <h1 class="title-responsive" style="color:#222222">Usuario administrador del sistema</h1>

        <p class="txt-resumen txt-info-et">Nombre</p>
        <p> José Agustín Aguilar Solórzano

          <p class="txt-resumen txt-info-et">Correo</p>
          <p> correo@ejemplo.com

            <p class="txt-resumen txt-info-et">Contraseña</p>
            <p> *******
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editar-datos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar datos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="font-weight: 400; color:#8c8d8f">
        <div class="mb-3">
          <label for="formEditar" class="form-label">Nombre</label>
          <input type="text" class="form-control" style="width: 100%" id="nombre"
            placeholder="José Agustín Aguilar Solórzano">
        </div>
        <div class="mb-3">
          <label for="formEditar" class="form-label">Correo</label>
          <input type="email" class="form-control" style="width: 100%" id="correo" placeholder="name@example.com">
        </div>
        <div class="mb-3">
          <label class="form-label" id="txt-editarC"><a href="javascript:editar();" style="color: #222B58;">Cambiar
              contraseña</a></label>
        </div>
        <div class="div-datos-pssw" id="div-datos-pssw">
          <div class="mb-3">
            <label for="formEditar" class="form-label">Contraseña actual</label>
            <input type="password" class="form-control" style="width: 100%" id="contraseña">
          </div>
          <div class="mb-3">
            <label for="formEditar" class="form-label">Contraseña nueva</label>
            <input type="password" class="form-control" style="width: 100%" id="contraseñaNueva">
          </div>
          <div class="mb-3">
            <label for="formEditar" class="form-label">Confirmar contraseña</label>
            <input type="password" class="form-control" style="width: 100%" id="contraseñaConf">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
          style="font-size: 15px">Cancelar</button>
        <button type="button" class="btn btn-success" style="font-size: 15px">Guardar</button>
      </div>
    </div>
  </div>
</div>


@endsection