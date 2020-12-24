@extends('layouts.admin')

@section('title')
Cuenta - Veintidós
@endsection

@section('head')
<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script languague="javascript">
  function editar() {
      txt = document.getElementById('txt-editarC');
      div = document.getElementById('div-datos-pssw');
      txt.style.display = 'none';
      div.style.display = 'block';
  }
  function cerrar() {
    txt = document.getElementById('txt-editarC');
      div = document.getElementById('div-datos-pssw');
      div.style.display = 'none';
      txt.style.display = 'block';
      $('#editar-datos').modal('hide'); 
  }
</script>
@endsection

@section('navbar')
<a class="navbar-brand" onclick="history.go(-1)" style="cursor: pointer;">
  <img src="{{ asset('img/sistema/backwhite.png') }}" alt="" style="height:23px;width:20px">
  &nbsp; Cuenta
</a>
@endsection

@section('content')
<div class="card cardAdmin">
  <div class="card-body">
    <div class="div-info-cuenta">
      <div class="div-foto-cuenta">
        <img src="{{ asset('img/sistema/userphoto.png')}}" alt="">
        <div><a href="#" class="a-cerrar-sesion" data-bs-toggle="modal"
            data-bs-target="#editar-datos">Editar datos<img src="{{ asset('img/sistema/edit.png')}}"
              style="height:12px; width: 13px; margin-left:10px; margin-bottom:2px" alt=""></a></div>
      </div>
      @foreach ($usuario as $user)
      <div class="div-content-info">
        <h1 class="title-responsive" style="color:#222222">Usuario administrador del sistema</h1>

        <p class="txt-resumen txt-info-et">Nombre</p>
        <p> {{$user->name}}&nbsp;{{$user->lastname}}

          <p class="txt-resumen txt-info-et">Correo</p>
          <p> {{$user->email}}

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
      <form action="{{ route('cuenta-update', ['id'=>$user->id]) }}"  method="POST" id="formCheckPassword" enctype="multipart/form-data">
        @method("PATCH")
                @csrf
        <div class="modal-body" style="font-weight: 400; color:#8c8d8f">
            <div class="mb-3">
              <label for="formEditar" class="form-label">Nombre</label>
              <input type="text" class="form-control" style="width: 100%" name="nombre" id="nombre"
                value="{{$user->name}}" required>
            </div>
            <div class="mb-3">
              <label for="formEditar" class="form-label">Apellido</label>
              <input type="text" class="form-control" style="width: 100%" name="apellido" id="apellido"
                value="{{$user->lastname}}" required>
            </div>
            <div class="mb-3">
              <label for="formEditar" class="form-label">Correo</label>
              <input type="email" class="form-control" style="width: 100%" name="correo" id="correo" required value="{{$user->email}}">
            </div>
            <div class="mb-3">
              <label class="form-label" id="txt-editarC"><a href="javascript:editar();" style="color: #222B58;">Cambiar
                  contraseña</a></label>
            </div>
            <div class="div-datos-pssw" id="div-datos-pssw">
              <div class="mb-3">
                <label for="formEditar" class="form-label">Contraseña actual</label>
                <input type="password" class="form-control"  style="width: 100%" name="passActual" id="passActual">
              </div>
              <div class="mb-3">
                <label for="formEditar" class="form-label">Contraseña nueva</label>
                <input type="password" class="form-control"  style="width: 100%" name="password" id="password">
              </div>
              <div class="mb-3">
                <label for="formEditar" class="form-label">Confirmar contraseña</label>
                <input type="password" class="form-control"   style="width: 100%" name="cfmPassword" id="cfmPassword">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <a href="javascript:cerrar();"><button type="button" class="btn btn-secondary" 
            style="font-size: 15px">Cancelar</button></a>
          <input type="submit" class="btn btn-success" style="font-size: 15px" value="Guardar">
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
<script>
  $("#formCheckPassword").validate({
         rules: {
             password: { 
               required: true,
                  minlength: 8,
                  maxlength: 10,

             } , 
             passActual: { 
               required: true
             } ,

                 cfmPassword: { 
                  equalTo: "#password",
                   minlength: 8,
                   maxlength: 10
             }


         },
   messages:{
       password: { 
               required:" Contraseña requerida",
               minlength: " Mínimo 8 caracteres",
               maxlength: " Máximo 10 caracteres"
             },

      passActual: { 
               required:" Contraseña requerida",
              },
      cfmPassword: { 
              required:" Contraseña requerida",
              equalTo: " Las contraseñas no coinciden",
              minlength: " Mínimo 8 caracteres",
              maxlength: " Máximo 10 caracteres"
     }
   }

});
</script>
@endsection