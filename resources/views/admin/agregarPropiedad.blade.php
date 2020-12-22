@extends('layouts.admin')

@section('title')
    Agregar Propiedad - Veintidós
@endsection

@section('head')
<link rel="stylesheet" href="{{ asset('/css/sideBar.css') }}">
<link rel="stylesheet" href="{{ asset('/css/OGestor.css') }}">
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
Propiedades | Agregar
@endsection

@section('content')
    <form class="Agregar-propiedades-margin-top container" action="" method="POST">
        @csrf
        <div class="row d-flex flex-wrap-reverse">
            <div class="col-md-5 col-12">
                <div class="col-12 O-images-loader d-flex flex-wrap">
                    {{-- PONER AQUYI IMAGENSITAS WOE --}}
                </div>
                <div class="O-inmueble-advise-images">
                    La primera imagen será la portada del inmueble
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" >
                </div>
            </div>
            <div class="col-md-7 col-12 form-row d-flex flex-wrap">
                <div class="form-group col-md-6 col-12">
                    <label for="inputTitle" class="O-form-text">Título*</label>
                    <input type="text" class="form-control" id="inputTitle" placeholder="Título" required>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="inputType">Tipo de propiedad*</label>
                    <select id="inputType" class="form-control" required>
                      <option selected value="" disabled hidden>Tipo...</option>
                      <option>Casa</option>
                      <option>Casa</option>
                      <option>Casa</option>
                      <option>Casa</option>
                    </select>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="inputType">Renta / Venta *</label>
                    <select id="inputType" class="form-control" required>
                      <option selected value="" disabled hidden>Renta / Venta</option>
                      <option value="venta">Venta</option>
                      <option value="renta">Renta</option>
                    </select>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="inputTitle" class="O-form-text">Precio*</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="Precio propuesto (Por mes)" required>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="inputTitle" class="O-form-text">Ciudad</label>
                    <input type="text" class="form-control" id="inputTitle" placeholder="Ciudad">
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="inputTitle" class="O-form-text">Colonia*</label>
                    <input type="text" class="form-control" id="inputTitle" placeholder="Colonia" required>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="inputTitle" class="O-form-text">Calle</label>
                    <input type="text" class="form-control" id="inputTitle" placeholder="Calle">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">No. Int.</label>
                    <input type="text" class="form-control" id="inputTitle" placeholder="Número interior">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">No. Ext.</label>
                    <input type="text" class="form-control" id="inputTitle" placeholder="Número exterior">
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="inputTitle" class="O-form-text">Estado*</label>
                    <input type="text" class="form-control" id="inputTitle" placeholder="Número exterior" required>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="inputTitle" class="O-form-text">Municipio*</label>
                    <input type="text" class="form-control" id="inputTitle" placeholder="Número exterior" required>
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">Terreno</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="En m2" required>
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">Construcción</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="En m2">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">Recámaras*</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="Recámaras">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">Baños*</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="Construcción en m2">
                </div>
            </div>
        </div>
    </form>
@endsection