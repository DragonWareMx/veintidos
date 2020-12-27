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
                      <th scope="col">COMPRA/RENTA</th>
                      <th scope="col">PROPIEDAD</th>
                    </tr>
                </thead>
                <tbody>
                  <tr data-bs-toggle="modal" data-bs-target="#modalInfo">
                        <th scope="row">1</th>
                        <td>Sin revisar</td>
                        <td>José Agustín Aguilar Solórzano</td>
                        <td>4444444444</td>
                        <td>Compra</td>
                        <td>8071</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Sin revisar</td>
                        <td>José Agustín Aguilar Solórzano</td>
                        <td>4444444444</td>
                        <td>Compra</td>
                        <td>8071</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Sin revisar</td>
                        <td>José Agustín Aguilar Solórzano</td>
                        <td>4444444444</td>
                        <td>Compra</td>
                        <td>8071</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Sin revisar</td>
                        <td>José Agustín Aguilar Solórzano</td>
                        <td>4444444444</td>
                        <td>Compra</td>
                        <td>8071</td>
                      </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Sin revisar</td>
                        <td>José Agustín Aguilar Solórzano</td>
                        <td>4444444444</td>
                        <td>Compra</td>
                        <td>8071</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Sin revisar</td>
                        <td>José Agustín Aguilar Solórzano</td>
                        <td>4444444444</td>
                        <td>Compra</td>
                        <td>8071</td>
                    </tr>
                    <tr>
                      <th scope="row">1</th>
                      <td>Sin revisar</td>
                      <td>José Agustín Aguilar Solórzano</td>
                      <td>4444444444</td>
                      <td>Compra</td>
                      <td>8071</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Sin revisar</td>
                        <td>José Agustín Aguilar Solórzano</td>
                        <td>4444444444</td>
                        <td>Compra</td>
                        <td>8071</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Sin revisar</td>
                        <td>José Agustín Aguilar Solórzano</td>
                        <td>4444444444</td>
                        <td>Compra</td>
                        <td>8071</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <nav aria-label="..." style="margin-top: 20px">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
        </nav>
    </div>
</div>


<!-- Modal info-->
<div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Mensajes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="font-weight: 400; color:#8c8d8f; display:flex; flex-wrap:wrap">
          <div class="div-body-info">
              <p class="txt-modal-etiq">Id:</p>
              <p class="txt-modal-info">48</p>
              <p class="txt-modal-etiq">Estado:</p>
              <select class="form-select form-control" id="edit-estado-modal" style="width: 50%; margin-bottom:10px" aria-label="Default select example">
                <option selected value="1">Sin revisar</option>
                <option value="2">Revisado</option>
              </select>
              <p class="txt-modal-info" id="Noedit-estado-modal">Sin revisar</p>
              <p class="txt-modal-etiq">Nombre:</p>
              <p class="txt-modal-info">José Agustín Aguilar Solórzano</p>
              <p class="txt-modal-etiq">Correo electrónico:</p>
              <p class="txt-modal-info">correo@ejemplo.com</p>
              <p class="txt-modal-etiq">Teléfono:</p>
              <p class="txt-modal-info">4444444444</p>
              <p class="txt-modal-etiq">Compra/Renta:</p>
              <p class="txt-modal-info">Compra</p>
              <p class="txt-modal-etiq">Comentarios:</p>
              <p class="txt-modal-info" style="text-align: justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi illum quis laudantium blanditiis labore! Natus dolore dolores iure vitae nisi quis blanditiis, odio ab ad repellendus maxime perferendis quae omnis.</p>
          </div>
          <div class="div-body-propiedad">
            <div class="div-modal-propiedad">
              <img class="img-propiedad-modal" src="{{ asset('img/photos/casa1.1.jpg') }}">
              <div class="div-info-propiedad">
                <p class="txt-title-mod-p"><a href="#">ESTRENA CASA EN VENTA EN FRACC. MIRASOLES, MORELIA...</a></p>
                <p><i class="fas fa-map-marker-alt"></i>Fracc. Mirasoles, Morelia.</p>
                <p>$3,173,00</p>
                <p style="margin-bottom: 0px">Clave: <b>8071</b></p>
              </div>
            </div>
            
          </div>
        </div>
        <div class="modal-footer">
          <div  id="edit-estado-modal-btns">
            <a href="javascript:noeditar();"><button type="button" class="btn btn-secondary" 
            style="font-size: 15px">Cancelar</button></a>
          <button type="button" class="btn btn-success" style="font-size: 15px">Guardar</button>
          </div>
          
          <a href="javascript:editar();"><button type="button" class="btn btn-success"  id="Noedit-estado-modal-btn" style="font-size: 15px">Editar</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection