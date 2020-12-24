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
<a class="navbar-brand" onclick="history.go(-1)" style="cursor: pointer;">
    <img src="{{ asset('img/sistema/backwhite.png') }}" alt="" style="height:23px;width:20px">
    &nbsp; Propiedades | Agregar
</a>
@endsection

@section('content')
    <form class="Agregar-propiedades-margin-top container" action="" method="POST">
        @csrf
        <div class="row d-flex flex-wrap-reverse mb-3 ps-1 pe-1">
            <div class="col-md-5 col-12 mb-3">
                <div id="gallery" class="gallery col-12 O-images-loader flex-wrap">
                    {{-- PONER AQUÍ IMAGENSITAS WOE --}}
                </div>
                <div class="O-inmueble-advise-images">
                    La primera imagen será la portada del inmueble
                </div>
                <div class="form-group mt-3">
                    <input id="gallery-photo-add" type="file" class="form-control" multiple>
                </div>
            </div>
            <div class="col-md-7 col-12 form-row d-flex flex-wrap mb-3">
                <div class="form-group col-md-6 col-12">
                    <label for="inputTitle" class="O-form-text">Título*</label>
                    <input type="text" class="form-control" id="inputTitle" placeholder="Título" required>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="inputType">Tipo de propiedad*</label>
                    <select id="inputType" class="form-control" required>
                      <option selected value="" disabled hidden>Tipo...</option>
                      <option>Casa</option>
                      <option>Departamento</option>
                      <option>Oficina</option>
                      <option>Local</option>
                      <option>Terreno</option>
                      <option>Bodega</option>
                    </select>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="inputTitle" class="O-form-text">Nombre del dueño</label>
                    <input type="text" class="form-control" id="inputTitle" placeholder="Responsable de la propiedad">
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
                    <label for="inputType">Estatus*</label>
                    <select id="inputType" class="form-control">
                      <option selected value="available">Disponible</option>
                      <option value="occupied">No disponible</option>
                    </select>
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
                    <input type="text" class="form-control" id="inputTitle" placeholder="Estado" required>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="inputTitle" class="O-form-text">Municipio*</label>
                    <input type="text" class="form-control" id="inputTitle" placeholder="Municipios" required>
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
                    <label for="inputTitle" class="O-form-text">Medios Baños*</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="Medios Baños">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">Baños*</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="Baños completos">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">Salas*</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="Salas">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">Cocinas*</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="Cocinas">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">Cocinas integrales*</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="Cocinas integrales">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">Comedores*</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="Comedores">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">Recámaras*</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="Recámaras">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputType">Patio</label>
                    <select id="inputType" class="form-control">
                      <option selected value="available">No</option>
                      <option value="occupied">Si</option>
                    </select>
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputType">Patio de servicio</label>
                    <select id="inputType" class="form-control">
                      <option selected value="available">No</option>
                      <option value="occupied">Si</option>
                    </select>
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputType">Cuarto de servicio</label>
                    <select id="inputType" class="form-control">
                      <option selected value="available">No</option>
                      <option value="occupied">Si</option>
                    </select>
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">Estudios*</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="Estudios">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">Cocheras*</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="Cocheras">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputType">Vigilancia</label>
                    <select id="inputType" class="form-control">
                      <option selected value="available">No</option>
                      <option value="occupied">Si</option>
                    </select>
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputType">Cisterna</label>
                    <select id="inputType" class="form-control">
                      <option selected value="available">No</option>
                      <option value="occupied">Si</option>
                    </select>
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">Antigëdad*</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="Antigëdad">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">Pisos*</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="Pisos">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputTitle" class="O-form-text">Piso*</label>
                    <input type="number" class="form-control" id="inputTitle" min="0" placeholder="Piso">
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputType">Elevador</label>
                    <select id="inputType" class="form-control">
                      <option selected value="available">No</option>
                      <option value="occupied">Si</option>
                    </select>
                </div>
                <div class="form-group col-md-3 col-6">
                    <label for="inputType">Acceso a carretera</label>
                    <select id="inputType" class="form-control">
                      <option selected value="available">No</option>
                      <option value="occupied">Si</option>
                    </select>
                </div>
                <div class="form-group w-100">
                    <label for="inputDescripción">Descripción*</label>
                    <textarea class="form-control pt-4  w-md-auto w-100" id="inputDescripción" rows="3" placeholder="Descripción" Required></textarea>
                </div>
            </div>
        </div>
        <div class="row d-flex flex-wrap O-mb-6 ps-1 pe-1">
            <div class="col-md-7 col-12">
                <div class="form-group w-100">
                    <label for="inputInfo" class="font-weight-bold">Información de contacto</label>
                    <textarea class="form-control pt-4  w-md-auto w-100" id="inputInfo" rows="3" placeholder="Información de contacto" Required></textarea>
                </div>
            </div>
            <div class="col-md-5 col-12 d-flex justify-content-end align-items-end mt-mb-0 mt-3">
                <a href="" class="O-btn-cancel ">Cancelar</a>
                <button type="submit" class="O-btn-save">Guardar</button>
            </div> 
        </div>
    </form>

<script>
    function previewImages() {
        var $preview = $('#gallery').empty();
        if (this.files) $.each(this.files, readAndPreview);
        function readAndPreview(i, file) {
            if (!/.(jpe?g|png|gif)$/i.test(file.name)){
                return alert("¡"+file.name +" no es una imagen!");
            } // else...
            var reader = new FileReader();
            $(reader).on("load", function() {
                $preview.append($("<img/>", {src:this.result, height:100}));
            });
            reader.readAsDataURL(file);
        }
    }
    $('#gallery-photo-add').on("change", previewImages);
</script>
@endsection