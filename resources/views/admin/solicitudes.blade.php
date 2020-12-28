@extends('layouts.admin')

@section('title')
Solicitudes - Veintidós
@endsection

@section('head')
<script languague="javascript">
  function editar() {
      noed = document.getElementById('Noedit-estado-modal');
      noed2 = document.getElementById('Noedit-estado-modal-btn');
      ed = document.getElementById('edit-estado-modal');
      ed2 = document.getElementById('edit-estado-modal-btns');
      noed.style.display = 'none';
      noed2.style.display = 'none';
      ed.style.display = 'block';
      ed2.style.display = 'block';
  }
  function noeditar() {
      noed = document.getElementById('Noedit-estado-modal');
      noed2 = document.getElementById('Noedit-estado-modal-btn');
      ed = document.getElementById('edit-estado-modal');
      ed2 = document.getElementById('edit-estado-modal-btns');
      noed.style.display = 'block';
      noed2.style.display = 'block';
      ed.style.display = 'none';
      ed2.style.display = 'none';
      $('#modalInfo').modal('hide'); 
  }
</script>
@endsection

@section('navbar')
<a class="navbar-brand" onclick="history.go(-1)" style="cursor: pointer;">
  <img src="{{ asset('img/sistema/backwhite.png') }}" alt="" style="height:23px;width:20px">
  &nbsp; Mensajes
</a>
@endsection

@section('content')
<div class="card cardAdmin">
    <div class="card-body">
        <h1 style="font-size: 20px; margin-bottom:20px">Solicitudes para añadir propiedades</h1>
        <div class="table-responsive-xl">
            <table class="table table-hover table-bordered justify-content-center">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">ESTADO</th>
                      <th scope="col">NOMBRE</th>
                      <th scope="col">TELÉFONO</th>
                      <th scope="col">COMPRA/RENTA</th>
                      <th scope="col">TIPO</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($solicitudes as $proposal)
                    <tr data-bs-toggle="modal" data-bs-target="#modalInfo" onclick="enviarId('{{$proposal->id}}','{{$proposal->status}}','{{$proposal->name}}','{{$proposal->lastname}}','{{$proposal->email}}','{{$proposal->phone_number}}','{{$proposal->deal}}','{{$proposal->propertie_type}}','{{$proposal->price}}')">
                        <th scope="row">{{$proposal->id}}</th>
                        @if($proposal->status=='available')
                          <td>Disponible</td>
                        @else
                          @if($proposal->status=='accepted')
                          <td>Aceptado</td>
                          @else
                          <td>Rechazado</td>
                          @endif
                        @endif
                        <td>{{$proposal->name}}&nbsp;{{$proposal->lastname}}</td>
                        <td>{{$proposal->phone_number}}</td>
                        @if($proposal->deal=='sale')
                          <td>Compra</td>
                        @else
                          <td>Renta</td>
                        @endif
                        <td>{{$proposal->propertie_type}}</td>
                    </tr>
                  @endforeach
                  
                </tbody>
            </table>
        </div>
        <div style="display:flex; justify-content: center">
        {{ $solicitudes->links() }}
        </div>
    </div>
</div>

<script>
  function enviarId($id, $status , $name, $lastname, $email, $phone, $deal, $type, $price){ 
      $('#id').val($id);
      $('#idUp').val($id);
      $('.status').val('Rechazado');
      if($status=='available')
        $('.status').val('Disponible');
      else if($status=='accepted')
        $('.status').val('Aceptado');
      $('#name').val($name);
      $('#email').val($email);
      $('#phone').val($phone);
      if($deal=='sale')
        $('#deal').val('Compra');
      else
        $('#deal').val('Renta');
      $('#type').val($type);
      $('#price').val($price);
  }
</script>

<!-- Modal info-->
<div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Solicitudes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('solicitudes-update')}}"  method="POST" enctype="multipart/form-data">
          @method("PATCH")
                  @csrf
        <div class="modal-body" style="font-weight: 400; color:#8c8d8f; display:flex; flex-wrap:wrap">
              <p class="txt-modal-etiq">Id:</p>
              <input class="txt-modal-info" id="id" name="id" readonly disabled>
              <input class="txt-modal-info" id="idUp" name="idUp" style="display: none" readonly>
              <p class="txt-modal-etiq">Estado:</p>
              <select class="form-select form-control" id="edit-estado-modal" name="estado" style="width: 50%; margin-bottom:10px" aria-label="Default select example">
                <option selected id="status" value="1">Disponible</option>
                <option value="2">Aceptado</option>
                <option value="3">Rechazado</option>
              </select>
              <input readonly disabled class="txt-modal-info status" id="Noedit-estado-modal"> 
              <p class="txt-modal-etiq">Nombre:</p>
              <input class="txt-modal-info" id="name" readonly disabled>
              <p class="txt-modal-etiq">Correo electrónico:</p>
              <input readonly disabled class="txt-modal-info" id="email">
              <p class="txt-modal-etiq">Teléfono:</p>
              <input readonly disabled class="txt-modal-info" id="phone">
              <p class="txt-modal-etiq">Compra/Renta:</p>
              <input readonly disabled class="txt-modal-info" id="deal">
              <p class="txt-modal-etiq">Tipo de propiedad:</p>
              <input readonly disabled class="txt-modal-info" id="type">
              <p class="txt-modal-etiq">Precio propuesto:</p>
              <input readonly disabled class="txt-modal-info" id="price">
              {{-- <a href="#" style="margin-top: 10px; color:#222B58; font-size:14px">Agregar propiedad</a> --}}
        </div>

        <div class="modal-footer">
          <div  id="edit-estado-modal-btns">
            <a href="javascript:noeditar();"><button type="button" class="btn btn-secondary" 
            style="font-size: 15px">Cancelar</button></a>
          <button type="submit" class="btn btn-success" style="font-size: 15px">Guardar</button>
          </div>
        </form>
          <a href="javascript:editar();"><button type="button" class="btn btn-success"  id="Noedit-estado-modal-btn" style="font-size: 15px">Editar</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection