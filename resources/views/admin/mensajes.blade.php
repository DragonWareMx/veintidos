@extends('layouts.admin')

@section('title')
Mensajes - Veintidós
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
        <h1 style="font-size: 20px; margin-bottom:20px">Interesados en comprar o rentar una propiedad</h1>
        <div class="table-responsive-xl">
            <table class="table table-hover table-bordered justify-content-center">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">ESTADO</th>
                      <th scope="col">NOMBRE</th>
                      <th scope="col">TELÉFONO</th>
                      <th scope="col">EMAIL</th>
                      <th scope="col">PROPIEDAD</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($mensajes as $c_proposal)
                    <tr data-bs-toggle="modal" data-bs-target="#modalInfo" onclick="enviarId('{{$c_proposal->id}}','{{$c_proposal->status}}','{{$c_proposal->name}}','{{$c_proposal->email}}','{{$c_proposal->phone_number}}','{{$c_proposal->propertie_id}}','{{$c_proposal->comment}}')">
                      <th scope="row">{{$c_proposal->id}}</th>
                      @if($c_proposal->status=='pending')
                        <td>Sin revisar</td>
                      @else
                        <td>Revisado</td>
                      @endif
                      <td>{{$c_proposal->name}}</td>
                      <td>{{$c_proposal->phone_number}}</td>
                      <td>{{$c_proposal->email}}</td>
                      <td>{{$c_proposal->propertie_id}}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        <div style="display:flex; justify-content: center">
          {{ $mensajes->links() }}
        </div>
    </div>
</div>

<script>
  function enviarId($id, $status , $name, $email, $phone, $propertie_id, $comment){ 
      $('#id').val($id);
      $('#idUp').val($id);
      if($status=='reviewed')
        $('.status').val('Revisado');
      else
        $('.status').val('Sin revisar');
      $('#name').val($name);
      $('#email').val($email);
      $('#phone').val($phone);
      $('#propertie').val($propertie_id);
      $('#comment').val($comment);
  }
</script>

<!-- Modal info-->
<div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Mensajes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('mensajes-update')}}"  method="POST" enctype="multipart/form-data">
          @method("PATCH")
                  @csrf
        <div class="modal-body" style="font-weight: 400; color:#8c8d8f; display:flex; flex-wrap:wrap">
          <div class="div-body-info">
              <p class="txt-modal-etiq">Id:</p>
              <input class="txt-modal-info" id="id" name="id" readonly disabled>
              <input class="txt-modal-info" id="idUp" name="idUp" style="display: none" readonly>
              <p class="txt-modal-etiq">Estado:</p>
              <select class="form-select form-control" id="edit-estado-modal" name="estado" style="width: 50%; margin-bottom:10px" aria-label="Default select example">
                <option selected value="1">Sin revisar</option>
                <option value="2">Revisado</option>
              </select>
              <input readonly disabled class="txt-modal-info status" id="Noedit-estado-modal"> 
              <p class="txt-modal-etiq">Nombre:</p>
              <input class="txt-modal-info" id="name" readonly disabled>
              <p class="txt-modal-etiq">Correo electrónico:</p>
              <input readonly disabled class="txt-modal-info" id="email">
              <p class="txt-modal-etiq">Teléfono:</p>
              <input readonly disabled class="txt-modal-info" id="phone">
              <p class="txt-modal-etiq">Comentarios:</p>
              <input readonly disabled class="txt-modal-info" id="comment" style="text-align: justify">
          </div>
          
          @php
              $var = 1;
          @endphp
          @foreach ($propiedades as $prop)
            @if($prop->id==$var)
              <div class="div-body-propiedad">
                <div class="div-modal-propiedad">
                  <img class="img-propiedad-modal" src="{{ asset($prop->photo) }}">
                  <div class="div-info-propiedad">
                    <p class="txt-title-mod-p" style="text-transform: uppercase"><a href="#">{{$prop->title}}</a></p>
                    <p><i class="fas fa-map-marker-alt"></i>{{$prop->street}},&nbsp;{{$prop->suburb}}&nbsp;{{$prop->town}}</p>
                    <p>${{$prop->price}}</p>
                    <p style="margin-bottom: 0px">Clave: <b>{{$prop->id}}</b></p>
                  </div>
                </div>
              </div>
            @endif
        @endforeach
          
        </div>
        <div class="modal-footer">
          <div  id="edit-estado-modal-btns">
            <a href="javascript:noeditar();"><button type="button" class="btn btn-secondary" 
            style="font-size: 15px">Cancelar</button></a>
          <button type="submit" class="btn btn-success" style="font-size: 15px">Guardar</button>
          </div>
          
          <a href="javascript:editar();"><button type="button" class="btn btn-success"  id="Noedit-estado-modal-btn" style="font-size: 15px">Editar</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection