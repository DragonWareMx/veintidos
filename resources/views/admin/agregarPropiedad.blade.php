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
    <div class="card Agregar-propiedades-margin-top mb-3">
    @if (session()->get('status'))
        <ul class="alert alert-success" style="margin-top:15px;">
           <li>{{session()->get('status')}}</li>
        </ul>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <div id="success" class="alert alert-success" role="alert" style="display:none">
           Propiedad creada con éxito!
        </div>
        <div id="errors" class="alert alert-danger" role="alert" style="display:none">
        </div>
        <form id="form-propiedad" class="container card-body" action="/admin/agregar/propiedad" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row d-flex flex-wrap-reverse ps-1 pe-1">
                <div class="col-md-5 col-12 mb-3">
                    <div id="gallery" class="gallery col-12 O-images-loader flex-wrap">
                        {{-- PONER AQUÍ IMAGENSITAS--}}
                    </div>
                    <div class="O-inmueble-advise-images">
                        La primera imagen será la portada del inmueble
                    </div>
                    <div class="form-group mt-3">
                        <input id="gallery-photo-add" type="file" class="form-control" multiple name="fotos[]">
                    </div>
                </div>
                <div class="col-md-7 col-12 form-row d-flex flex-wrap mb-3">
                    <div class="form-group col-md-6 col-12">
                        <label for="inputTitle" class="O-form-text">Título*</label>
                        <input type="text" class="form-control" id="inputTitle" placeholder="Título" required name="titulo" value="{{ old('titulo') }}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputType">Tipo de propiedad*</label>
                        <select id="inputType" class="form-control" required onchange="cambio(this)" name="tipo">
                          <option selected value="" disabled hidden>Tipo...</option>
                          <option value="casa">Casa</option>
                          <option value="departamento">Departamento</option>
                          <option value="oficina">Oficina</option>
                          <option value="local">Local</option>
                          <option value="terreno">Terreno</option>
                          <option value="bodega">Bodega</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputName" class="O-form-text">Nombre del dueño</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Responsable de la propiedad" required name="owner" value="{{ old('owner') }}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputSeal">Renta / Venta *</label>
                        <select id="inputSeal" class="form-control" required name="deal">
                          <option selected value="" disabled hidden>Renta / Venta</option>
                          <option value="sale">Venta</option>
                          <option value="rent">Renta</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputPrice" class="O-form-text">Precio*</label>
                        <input type="number" class="form-control" id="inputPrice" min="0" placeholder="Precio propuesto (Por mes)" required name="precio" value="{{ old('precio') }}"> 
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputDisp">Estatus*</label>
                        <select id="inputDisp" class="form-control" required name="estatus">
                          <option selected value="available">Disponible</option>
                          <option value="occupied">No disponible</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputCity" class="O-form-text">Ciudad</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="Ciudad" name="ciudad" value="{{ old('ciudad') }}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputSuburb" class="O-form-text">Colonia*</label>
                        <input type="text" class="form-control" id="inputSuburb" placeholder="Colonia" required name="colonia" value="{{ old('colonia') }}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputStreet" class="O-form-text">Calle</label>
                        <input type="text" class="form-control" id="inputStreet" placeholder="Calle" name="calle" value="{{ old('calle') }}">
                    </div>
                    <div class="form-group col-md-3 col-6">
                        <label for="inputInt" class="O-form-text">No. Int.</label>
                        <input type="text" class="form-control" id="inputInt" placeholder="Número interior" name="int" value="{{ old('int') }}">
                    </div>
                    <div class="form-group col-md-3 col-6">
                        <label for="inputExt" class="O-form-text">No. Ext.</label>
                        <input type="text" class="form-control" id="inputExt" placeholder="Número exterior" name="ext" value="{{ old('ext') }}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputState" class="O-form-text">Estado*</label>
                        <input type="text" class="form-control" id="inputState" placeholder="Estado" required name="estado" value="{{ old('estado') }}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputMunicip" class="O-form-text">Municipio*</label>
                        <input type="text" class="form-control" id="inputMunicip" placeholder="Municipios" required name="municipio" value="{{ old('municipio') }}">
                    </div>
                    <div class="form-group col-md-3 col-6" style="display:none;" id="terreno">
                        <label for="inputTerrain" class="O-form-text">Terreno</label>
                        <input type="number" class="form-control" id="inputTerrain" min="0" placeholder="En m2" name="terreno" value="0">
                    </div>
                    <div class="form-group col-md-3 col-6" style="display:none;" id="construccion">
                        <label for="inputConstruct" class="O-form-text">Construcción</label>
                        <input value="0" type="number" class="form-control" id="inputConstruct" min="0" placeholder="En m2" name="construccion">
                    </div>
                    <div class="form-group col-md-3 col-6" style="display:none" id="half">
                        <label for="inputHalf" class="O-form-text">Medios Baños*</label>
                        <input value="0" type="number" class="form-control" id="inputHalf" min="0" placeholder="Medios Baños" name="half">
                    </div>
                    <div class="form-group col-md-3 col-6" style="display:none;" id="bañoC">
                        <label for="inputBat" class="O-form-text">Baños*</label>
                        <input value="0" type="number" class="form-control" id="inputBat" min="0" placeholder="Baños completos" name="bañoC"> 
                    </div>
                    <div class="form-group col-md-3 col-6" style="display:none;" id="salas">
                        <label for="inputRoom" class="O-form-text">Salas*</label>
                        <input value="0" type="number" class="form-control" id="inputRoom" min="0" placeholder="Salas" name="salas">
                    </div>
                    <div class="form-group col-md-3 col-6" style="display:none;" id="cocinas">
                        <label for="inputKit" class="O-form-text">Cocinas*</label>
                        <input value="0" type="number" class="form-control" id="inputKit" min="0" placeholder="Cocinas" name="cocinas">
                    </div>
                    <div class="form-group col-md-3 col-6" style="display:none;" id="integrales">
                        <label for="inputKitchen" class="O-form-text">Cocinas integrales*</label>
                        <input value="0" type="number" class="form-control" id="inputKitchen" min="0" placeholder="Cocinas integrales" name="integrales">
                    </div>
                    <div class="form-group col-md-3 col-6" style="display:none;" id="comedores">
                        <label for="inputTable" class="O-form-text">Comedores*</label>
                        <input value="0" type="number" class="form-control" id="inputTable" min="0" placeholder="Comedores" name="comedores">
                    </div>
                    <div class="form-group col-md-3 col-6" style="display:none;" id="cuartos">
                        <label for="inputBed" class="O-form-text">Recámaras*</label>
                        <input value="0" type="number" class="form-control" id="inputBed" min="0" placeholder="Recámaras" name="cuartos">
                    </div>
                    <div class="form-group col-md-3 col-6" id="patio" style="display:none;">
                        <label for="inputYard">Patio</label>
                        <select id="inputYard" class="form-control" name="patio">
                          <option selected value="0">No</option>
                          <option value="1">Sí</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-6" id="pServicio" style="display:none;">
                        <label for="inputServiceY">Patio de servicio</label>
                        <select id="inputServiceY" class="form-control" name="pServicio">
                          <option selected value="0">No</option>
                          <option value="1">Sí</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-6" id="cServicio" style="display:none;">
                        <label for="inputServiceR">Cuarto de servicio</label>
                        <select id="inputServiceR" class="form-control" name="cServicio">
                          <option selected value="0">No</option>
                          <option value="1">Sí</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-6" id="estudios" style="display:none;">
                        <label for="inputStudies" class="O-form-text">Estudios*</label>
                        <input value="0" type="number" class="form-control" id="inputStudies" min="0" placeholder="Estudios" name="estudios">
                    </div>
                    <div class="form-group col-md-3 col-6" id="cocheras" style="display:none;">
                        <label for="inputGarages" class="O-form-text">Cocheras*</label>
                        <input value="0" type="number" class="form-control" id="inputGarages" min="0" placeholder="Cocheras" name="cocheras">
                    </div>
                    <div class="form-group col-md-3 col-6" id="vigilancia" style="display:none;">
                        <label for="inputVigilance">Vigilancia</label>
                        <select id="inputVigilance" class="form-control" name="vigilancia">
                          <option selected value="0">No</option>
                          <option value="1">Sí</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-6" id="cisterna" style="display:none;">
                        <label for="inputCistern">Cisterna</label>
                        <select id="inputCistern" class="form-control" name="cisterna">
                          <option selected value="0">No</option>
                          <option value="1">Sí</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-6" id="antiguedad" style="display:none;">
                        <label for="inputAnt" class="O-form-text">Antigëdad*</label>
                        <input value="0" type="number" class="form-control" id="inputAnt" min="0" placeholder="Antigëdad" name="antiguedad">
                    </div>
                    <div class="form-group col-md-3 col-6" id="pisos" style="display:none;">
                        <label for="inputFloors" class="O-form-text">Pisos*</label>
                        <input value="1" type="number" class="form-control" id="inputFloors" min="0" placeholder="Pisos" name="pisos">
                    </div>
                    <div class="form-group col-md-3 col-6" id="piso" style="display:none;">
                        <label for="inputFloor" class="O-form-text">Piso*</label>
                        <input value="1" type="number" class="form-control" id="inputFloor" min="0" placeholder="Piso" name="piso">
                    </div>
                    <div class="form-group col-md-3 col-6" id="elevador" style="display:none;">
                        <label for="inputElevator">Elevador</label>
                        <select id="inputElevator" class="form-control" name="elevador">
                          <option selected value="0">No</option>
                          <option value="1">Sí</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-6" id="oficina" style="display:none;">
                        <label for="inputElevator">Oficina</label>
                        <select id="inputElevator" class="form-control" name="oficina">
                          <option selected value="0">No</option>
                          <option value="1">Sí</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-6" id="acceso" style="display:none;">
                        <label for="inputAccess">Acceso a carretera</label>
                        <select id="inputAccess" class="form-control" name="acceso">
                          <option selected value="0">No</option>
                          <option value="1">Sí</option>
                        </select>
                    </div>
                    <div class="form-group w-100">
                        <label for="inputDescription">Descripción*</label>
                        <textarea class="form-control pt-4  w-md-auto w-100" id="inputDescription" rows="3" placeholder="Descripción" Required name="descripcion">{{ old('descripcion') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row d-flex flex-wrap O-mb-6 ps-1 pe-1">
                <div class="col-md-7 col-12">
                    <div class="form-group w-100">
                        <label for="inputInfo" class="font-weight-bold">Información de contacto</label>
                        <textarea class="form-control pt-4  w-md-auto w-100" id="inputInfo" rows="3" placeholder="Información de contacto" Required name="info">{{ old('info') }}</textarea>
                    </div>
                </div>
                <div class="col-md-5 col-12 d-flex justify-content-end align-items-end mt-mb-0 mt-3">
                    <a href="" class="O-btn-cancel ">Cancelar</a>
                    <button type="submit" class="O-btn-save" id="btnEnviar">Guardar</button>
                </div> 
            </div>
        </form>
    </div>

<script>
    function cambio(valor){
        valor=valor.value;
        document.getElementById('terreno').style.display="none";
        document.getElementById('acceso').style.display="none";
        document.getElementById('construccion').style.display="none";
        document.getElementById('half').style.display="none";
        document.getElementById('piso').style.display="none";
        document.getElementById('cisterna').style.display="none";
        document.getElementById('elevador').style.display="none";
        document.getElementById('vigilancia').style.display="none";
        document.getElementById('salas').style.display="none";
        document.getElementById('cocinas').style.display="none";
        document.getElementById('integrales').style.display="none";
        document.getElementById('comedores').style.display="none";
        document.getElementById('bañoC').style.display="none";
        document.getElementById('cuartos').style.display="none";
        document.getElementById('patio').style.display="none";
        document.getElementById('pServicio').style.display="none";
        document.getElementById('cServicio').style.display="none";
        document.getElementById('estudios').style.display="none";
        document.getElementById('cocheras').style.display="none";
        document.getElementById('antiguedad').style.display="none";
        document.getElementById('pisos').style.display="none";
        document.getElementById('oficina').style.display="none";
        switch(valor){
            case 'casa':
                //aparecer elementos
                document.getElementById('salas').style.display="block";
                document.getElementById('cocinas').style.display="block";
                document.getElementById('integrales').style.display="block";
                document.getElementById('comedores').style.display="block";
                document.getElementById('half').style.display="block";
                document.getElementById('bañoC').style.display="block";
                document.getElementById('cuartos').style.display="block";
                document.getElementById('patio').style.display="block";
                document.getElementById('pServicio').style.display="block";
                document.getElementById('cServicio').style.display="block";
                document.getElementById('estudios').style.display="block";
                document.getElementById('cocheras').style.display="block";
                document.getElementById('vigilancia').style.display="block";
                document.getElementById('cisterna').style.display="block";
                document.getElementById('antiguedad').style.display="block";
                document.getElementById('construccion').style.display="block";
                document.getElementById('terreno').style.display="block";
                document.getElementById('pisos').style.display="block";
                break;
            case 'departamento':
                //aparecer elementos
                document.getElementById('salas').style.display="block";
                document.getElementById('cocinas').style.display="block";
                document.getElementById('integrales').style.display="block";
                document.getElementById('comedores').style.display="block";
                document.getElementById('half').style.display="block";
                document.getElementById('bañoC').style.display="block";
                document.getElementById('cuartos').style.display="block";
                document.getElementById('patio').style.display="block";
                document.getElementById('pServicio').style.display="block";
                document.getElementById('cServicio').style.display="block";
                document.getElementById('estudios').style.display="block";
                document.getElementById('cocheras').style.display="block";
                document.getElementById('vigilancia').style.display="block";
                document.getElementById('cisterna').style.display="block";
                document.getElementById('antiguedad').style.display="block";
                document.getElementById('pisos').style.display="block";
                document.getElementById('piso').style.display="block";
                document.getElementById('elevador').style.display="block";
                document.getElementById('construccion').style.display="block";
                break;
            case 'oficina':
            case 'local':
                //aparecer elementos
                document.getElementById('construccion').style.display="block";
                document.getElementById('half').style.display="block";
                document.getElementById('piso').style.display="block";
                document.getElementById('cisterna').style.display="block";
                document.getElementById('elevador').style.display="block";
                document.getElementById('vigilancia').style.display="block";
                break;
            case 'terreno':
                //aparecer
                document.getElementById('terreno').style.display="block";
                document.getElementById('acceso').style.display="block";
                break;
            case 'bodega':
                //
                document.getElementById('terreno').style.display="block";
                document.getElementById('construccion').style.display="block";
                document.getElementById('oficina').style.display="block";
                break;
        }
    }
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
<script>
    //ajax del form de nuevo
    $("#form-propiedad").bind("submit",function(){
        // Capturamnos el boton de envío
        var btnEnviar = $("#btnEnviar");

        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: new FormData(this),
            dataType: "JSON",
            processData: false,
            contentType: false,
            beforeSend: function(data){
                /*
                * Esta función se ejecuta durante el envió de la petición al
                * servidor.
                * */
                // btnEnviar.text("Enviando"); Para button
                btnEnviar.val("Enviando"); // Para input de tipo button
                btnEnviar.attr("disabled","disabled");
            },
            complete:function(data){
                /*
                * Se ejecuta al termino de la petición
                * */
                btnEnviar.val("Enviar formulario");
            },
            success: function(data){
                /*
                * Se ejecuta cuando termina la petición y esta ha sido
                * correcta
                * */
                $('#success').css('display', 'flex');
                $('#errors').css('display', 'none');
                alert('Propiedad creada con éxito!');
                setTimeout(
                function()
                {
                    window.location.href = window.location.origin + '/admin/propiedades'
                }, 2000);
            },
            error: function(data){
                console.log(data);
                $('#success').css('display', 'none');
                btnEnviar.removeAttr("disabled");
                $('#errors').css('display', 'block');
                var errors = data.responseJSON.errors;
                var errorsContainer = $('#errors');
                errorsContainer.innerHTML = '';
                var errorsList = '';
                // for (var i = 0; i < errors.length; i++) {
                // //     //if(errors[i].redirect)
                // //         //window.location.href = window.location.origin + '/logout'
                    
                //     errorsList += '<div class="uk-alert-danger" uk-alert><a class="uk-alert-close" uk-close></a><p>'+ errors[i].errors +'</p></div>';
                // }
                for(var key in errors){
                    var obj=errors[key];
                    console.log(obj);
                    for(var yek in obj){
                        var error=obj[yek];
                        console.log(error);
                        errorsList += '<div><a></a><p>'+ error +'</p></div>';
                    }
                }
                errorsContainer.html(errorsList);
                alert('Problemas al tratar de enviar el formulario');
            }
        });
        // Nos permite cancelar el envio del formulario
        return false;
    });
</script>
@endsection