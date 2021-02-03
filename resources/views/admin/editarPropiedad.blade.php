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
    &nbsp; Propiedades | Editar
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
        <form class="container card-body" action="{{ route('editarPropiedadPost',['id'=>Crypt::encrypt($propiedad->id)]) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="row d-flex flex-wrap-reverse ps-1 pe-1">
                <div class="col-md-5 col-12 mb-3">
                    <div id="gallery" class="gallery col-12 O-images-loader flex-wrap">
                        {{-- PONER AQUÍ IMAGENSITAS--}}
                        <img src="{{asset($propiedad->photo)}}" alt="{{$propiedad->photo}}">
                        @foreach ($propiedad->photos as $photo)
                            <img src="{{asset($photo->path)}}" alt="{{$photo->path}}">
                        @endforeach
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
                        <input type="text" class="form-control" id="inputTitle" placeholder="Título" required name="titulo" value="{{$propiedad->title}}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputType">Tipo de propiedad*</label>
                        <select id="inputType" class="form-control" required onchange="cambio(this)" name="tipo">
                            @if(count($propiedad->house()->get())==1)
                                <option value="casa" selected>Casa</option>
                            @endif
                            @if(count($propiedad->department()->get())==1)
                                <option value="departamento" selected>Departamento</option>
                            @endif
                            @if(count($propiedad->office()->get())==1)
                                @if ($propiedad->office->type=='office')
                                    <option value="oficina" selected>Oficina</option>
                                @endif
                                @if ($propiedad->office->type=='premises')
                                    <option value="local" selected>Local</option>
                                @endif
                            @endif
                            @if(count($propiedad->terrain()->get())==1)
                                <option value="terreno" selected>Terreno</option>
                            @endif
                            @if(count($propiedad->warehouse()->get())==1)
                                <option value="bodega" selected>Bodega</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputName" class="O-form-text">Nombre del dueño</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Responsable de la propiedad" required name="owner" value="{{$propiedad->owner_name}}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputSeal">Renta / Venta *</label>
                        <select id="inputSeal" class="form-control" required name="deal">
                            @if ($propiedad->deal=='sale')
                            <option value="sale" selected>Venta</option>
                            <option value="rent">Renta</option>  
                            @else
                                <option value="sale">Venta</option>
                                <option value="rent" selected>Renta</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputPrice" class="O-form-text">Precio*</label>
                        <input type="number" class="form-control" id="inputPrice" min="0" placeholder="Precio propuesto (Por mes)" required name="precio" value="{{$propiedad->price}}"> 
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputDisp">Estatus*</label>
                        <select id="inputDisp" class="form-control" required name="estatus">
                            @if ($propiedad->status=='available')
                                <option selected value="available">Disponible</option>
                                <option value="occupied">No disponible</option>
                            @else
                                <option value="available">Disponible</option>
                                <option selected value="occupied">No disponible</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputCity" class="O-form-text">Ciudad</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="Ciudad" name="ciudad" value="{{$propiedad->city}}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputSuburb" class="O-form-text">Colonia*</label>
                        <input type="text" class="form-control" id="inputSuburb" placeholder="Colonia" required name="colonia" value="{{$propiedad->suburb}}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputStreet" class="O-form-text">Calle</label>
                        <input type="text" class="form-control" id="inputStreet" placeholder="Calle" name="calle" value="{{$propiedad->street}}">
                    </div>
                    <div class="form-group col-md-3 col-6">
                        <label for="inputInt" class="O-form-text">No. Int.</label>
                        <input type="text" class="form-control" id="inputInt" placeholder="Número interior" name="int" value="{{$propiedad->int_number}}">
                    </div>
                    <div class="form-group col-md-3 col-6">
                        <label for="inputExt" class="O-form-text">No. Ext.</label>
                        <input type="text" class="form-control" id="inputExt" placeholder="Número exterior" name="ext" value="{{$propiedad->ext_number}}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputState" class="O-form-text">Estado*</label>
                        <input type="text" class="form-control" id="inputState" placeholder="Estado" required name="estado" value="{{$propiedad->state}}">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="inputMunicip" class="O-form-text">Municipio*</label>
                        <input type="text" class="form-control" id="inputMunicip" placeholder="Municipios" required name="municipio" value="{{$propiedad->town}}">
                    </div>
                    @if (count($propiedad->house()->get())==1 || count($propiedad->terrain()->get())==1 || count($propiedad->warehouse()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                            <div class="form-group col-md-3 col-6" id="terreno">
                                <label for="inputTerrain" class="O-form-text">Terreno</label>
                                <input type="number" class="form-control" id="inputTerrain" min="0" placeholder="En m2" name="terreno" value="{{$propiedad->house->terrain}}">
                            </div>
                        @endif
                        @if (count($propiedad->terrain()->get())==1)
                            <div class="form-group col-md-3 col-6" id="terreno">
                                <label for="inputTerrain" class="O-form-text">Terreno</label>
                                <input type="number" class="form-control" id="inputTerrain" min="0" placeholder="En m2" name="terreno" value="{{$propiedad->terrain->terrain}}">
                            </div>
                        @endif
                        @if (count($propiedad->warehouse()->get())==1)
                            <div class="form-group col-md-3 col-6" id="terreno">
                                <label for="inputTerrain" class="O-form-text">Terreno</label>
                                <input type="number" class="form-control" id="inputTerrain" min="0" placeholder="En m2" name="terreno" value="{{$propiedad->warehouse->terrain}}">
                            </div>
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" style="display:none;" id="terreno">
                            <label for="inputTerrain" class="O-form-text">Terreno</label>
                            <input type="number" class="form-control" id="inputTerrain" min="0" placeholder="En m2" name="terreno" value="0">
                        </div>
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->office()->get())==1 || count($propiedad->department()->get())==1 || count($propiedad->warehouse()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                            <div class="form-group col-md-3 col-6" id="construccion">
                                <label for="inputConstruct" class="O-form-text">Construcción</label>
                                <input value="{{$propiedad->house->construction}}" type="number" class="form-control" id="inputConstruct" min="0" placeholder="En m2" name="construccion">
                            </div>
                        @endif
                        @if (count($propiedad->office()->get())==1)
                            <div class="form-group col-md-3 col-6" id="construccion">
                                <label for="inputConstruct" class="O-form-text">Construcción</label>
                                <input value="{{$propiedad->office->construction}}" type="number" class="form-control" id="inputConstruct" min="0" placeholder="En m2" name="construccion">
                            </div>
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            <div class="form-group col-md-3 col-6" id="construccion">
                                <label for="inputConstruct" class="O-form-text">Construcción</label>
                                <input value="{{$propiedad->department->construction}}" type="number" class="form-control" id="inputConstruct" min="0" placeholder="En m2" name="construccion">
                            </div>
                        @endif
                        @if (count($propiedad->warehouse()->get())==1)
                            <div class="form-group col-md-3 col-6" id="construccion">
                                <label for="inputConstruct" class="O-form-text">Construcción</label>
                                <input value="{{$propiedad->warehouse->construction}}" type="number" class="form-control" id="inputConstruct" min="0" placeholder="En m2" name="construccion">
                            </div>
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" style="display:none;" id="construccion">
                            <label for="inputConstruct" class="O-form-text">Construcción</label>
                            <input value="0" type="number" class="form-control" id="inputConstruct" min="0" placeholder="En m2" name="construccion">
                        </div>
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->office()->get())==1 || count($propiedad->department()->get())==1 || count($propiedad->warehouse()->get())==1 )
                        @if (count($propiedad->house()->get())==1)
                            <div class="form-group col-md-3 col-6" id="half">
                                <label for="inputHalf" class="O-form-text">Medios Baños*</label>
                                <input value="{{$propiedad->house->half_bathrooms}}" type="number" class="form-control" id="inputHalf" min="0" placeholder="Medios Baños" name="half">
                            </div> 
                        @endif
                        @if (count($propiedad->office()->get())==1)
                            <div class="form-group col-md-3 col-6" id="half">
                                <label for="inputHalf" class="O-form-text">Medios Baños*</label>
                                <input value="{{$propiedad->office->half_bathrooms}}" type="number" class="form-control" id="inputHalf" min="0" placeholder="Medios Baños" name="half">
                            </div> 
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            <div class="form-group col-md-3 col-6" id="half">
                                <label for="inputHalf" class="O-form-text">Medios Baños*</label>
                                <input value="{{$propiedad->department->half_bathrooms}}" type="number" class="form-control" id="inputHalf" min="0" placeholder="Medios Baños" name="half">
                            </div> 
                        @endif
                        @if (count($propiedad->warehouse()->get())==1)
                            <div class="form-group col-md-3 col-6" id="half">
                                <label for="inputHalf" class="O-form-text">Medios Baños*</label>
                                <input value="{{$propiedad->warehouse->half_bathrooms}}" type="number" class="form-control" id="inputHalf" min="0" placeholder="Medios Baños" name="half">
                            </div> 
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" style="display:none" id="half">
                            <label for="inputHalf" class="O-form-text">Medios Baños*</label>
                            <input value="0" type="number" class="form-control" id="inputHalf" min="0" placeholder="Medios Baños" name="half">
                        </div>
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                            <div class="form-group col-md-3 col-6" id="bañoC">
                                <label for="inputBat" class="O-form-text">Baños*</label>
                                <input value="{{$propiedad->house->bathrooms}}" type="number" class="form-control" id="inputBat" min="0" placeholder="Baños completos" name="bañoC"> 
                            </div>
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            <div class="form-group col-md-3 col-6" id="bañoC">
                                <label for="inputBat" class="O-form-text">Baños*</label>
                                <input value="{{$propiedad->department->bathrooms}}" type="number" class="form-control" id="inputBat" min="0" placeholder="Baños completos" name="bañoC"> 
                            </div>
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" style="display:none;" id="bañoC">
                            <label for="inputBat" class="O-form-text">Baños*</label>
                            <input value="0" type="number" class="form-control" id="inputBat" min="0" placeholder="Baños completos" name="bañoC"> 
                        </div>
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                            <div class="form-group col-md-3 col-6" id="salas">
                                <label for="inputRoom" class="O-form-text">Salas*</label>
                                <input value="{{$propiedad->house->living_rooms}}" type="number" class="form-control" id="inputRoom" min="0" placeholder="Salas" name="salas">
                            </div>
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            <div class="form-group col-md-3 col-6" id="salas">
                                <label for="inputRoom" class="O-form-text">Salas*</label>
                                <input value="{{$propiedad->department->living_rooms}}" type="number" class="form-control" id="inputRoom" min="0" placeholder="Salas" name="salas">
                            </div>
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" style="display:none;" id="salas">
                            <label for="inputRoom" class="O-form-text">Salas*</label>
                            <input value="0" type="number" class="form-control" id="inputRoom" min="0" placeholder="Salas" name="salas">
                        </div>
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                            <div class="form-group col-md-3 col-6" id="cocinas">
                                <label for="inputKit" class="O-form-text">Cocinas*</label>
                                <input value="{{$propiedad->house->kitchens}}" type="number" class="form-control" id="inputKit" min="0" placeholder="Cocinas" name="cocinas">
                            </div>
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            <div class="form-group col-md-3 col-6" id="cocinas">
                                <label for="inputKit" class="O-form-text">Cocinas*</label>
                                <input value="{{$propiedad->department->kitchens}}" type="number" class="form-control" id="inputKit" min="0" placeholder="Cocinas" name="cocinas">
                            </div>
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" style="display:none;" id="cocinas">
                            <label for="inputKit" class="O-form-text">Cocinas*</label>
                            <input value="0" type="number" class="form-control" id="inputKit" min="0" placeholder="Cocinas" name="cocinas">
                        </div>
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                            <div class="form-group col-md-3 col-6" id="integrales">
                                <label for="inputKitchen" class="O-form-text">Cocinas integrales*</label>
                                <input value="{{$propiedad->house->integral_kitchen}}" type="number" class="form-control" id="inputKitchen" min="0" placeholder="Cocinas integrales" name="integrales">
                            </div>  
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            <div class="form-group col-md-3 col-6" id="integrales">
                                <label for="inputKitchen" class="O-form-text">Cocinas integrales*</label>
                                <input value="{{$propiedad->department->integral_kitchen}}" type="number" class="form-control" id="inputKitchen" min="0" placeholder="Cocinas integrales" name="integrales">
                            </div>  
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" style="display:none;" id="integrales">
                            <label for="inputKitchen" class="O-form-text">Cocinas integrales*</label>
                            <input value="0" type="number" class="form-control" id="inputKitchen" min="0" placeholder="Cocinas integrales" name="integrales">
                        </div> 
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                            <div class="form-group col-md-3 col-6" id="comedores">
                                <label for="inputTable" class="O-form-text">Comedores*</label>
                                <input value="{{$propiedad->house->dining_rooms}}" type="number" class="form-control" id="inputTable" min="0" placeholder="Comedores" name="comedores">
                            </div> 
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            <div class="form-group col-md-3 col-6" id="comedores">
                                <label for="inputTable" class="O-form-text">Comedores*</label>
                                <input value="{{$propiedad->department->dining_rooms}}" type="number" class="form-control" id="inputTable" min="0" placeholder="Comedores" name="comedores">
                            </div> 
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" style="display:none;" id="comedores">
                            <label for="inputTable" class="O-form-text">Comedores*</label>
                            <input value="0" type="number" class="form-control" id="inputTable" min="0" placeholder="Comedores" name="comedores">
                        </div>  
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                            <div class="form-group col-md-3 col-6" id="cuartos">
                                <label for="inputBed" class="O-form-text">Recámaras*</label>
                                <input value="{{$propiedad->house->bedrooms}}" type="number" class="form-control" id="inputBed" min="0" placeholder="Recámaras" name="cuartos">
                            </div> 
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            <div class="form-group col-md-3 col-6" id="cuartos">
                                <label for="inputBed" class="O-form-text">Recámaras*</label>
                                <input value="{{$propiedad->department->bedrooms}}" type="number" class="form-control" id="inputBed" min="0" placeholder="Recámaras" name="cuartos">
                            </div> 
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" style="display:none;" id="cuartos">
                            <label for="inputBed" class="O-form-text">Recámaras*</label>
                            <input value="0" type="number" class="form-control" id="inputBed" min="0" placeholder="Recámaras" name="cuartos">
                        </div> 
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                            @if ($propiedad->house->yard==0)
                                <div class="form-group col-md-3 col-6" id="patio">
                                    <label for="inputYard">Patio</label>
                                    <select id="inputYard" class="form-control" name="patio">
                                    <option selected value="0">No</option>
                                    <option value="1">Sí</option>
                                    </select>
                                </div>
                            @else
                                <div class="form-group col-md-3 col-6" id="patio">
                                    <label for="inputYard">Patio</label>
                                    <select id="inputYard" class="form-control" name="patio">
                                    <option value="0">No</option>
                                    <option selected value="1">Sí</option>
                                    </select>
                                </div>
                            @endif
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            @if ($propiedad->department->yard==0)
                                <div class="form-group col-md-3 col-6" id="patio">
                                    <label for="inputYard">Patio</label>
                                    <select id="inputYard" class="form-control" name="patio">
                                    <option selected value="0">No</option>
                                    <option value="1">Sí</option>
                                    </select>
                                </div>
                            @else
                                <div class="form-group col-md-3 col-6" id="patio">
                                    <label for="inputYard">Patio</label>
                                    <select id="inputYard" class="form-control" name="patio">
                                    <option value="0">No</option>
                                    <option selected value="1">Sí</option>
                                    </select>
                                </div>
                            @endif
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" id="patio" style="display:none;">
                            <label for="inputYard">Patio</label>
                            <select id="inputYard" class="form-control" name="patio">
                            <option selected value="0">No</option>
                            <option value="1">Sí</option>
                            </select>
                        </div>
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                           @if ($propiedad->house->service_yard == 0)
                            <div class="form-group col-md-3 col-6" id="pServicio">
                                <label for="inputServiceY">Patio de servicio</label>
                                <select id="inputServiceY" class="form-control" name="pServicio">
                                <option selected value="0">No</option>
                                <option value="1">Sí</option>
                                </select>
                            </div>
                           @else
                            <div class="form-group col-md-3 col-6" id="pServicio">
                                <label for="inputServiceY">Patio de servicio</label>
                                <select id="inputServiceY" class="form-control" name="pServicio">
                                <option value="0">No</option>
                                <option selected value="1">Sí</option>
                                </select>
                            </div>
                           @endif 
                        @endif
                        @if (count($propiedad->department()->get())==1)
                           @if ($propiedad->department->service_yard == 0)
                            <div class="form-group col-md-3 col-6" id="pServicio">
                                <label for="inputServiceY">Patio de servicio</label>
                                <select id="inputServiceY" class="form-control" name="pServicio">
                                <option selected value="0">No</option>
                                <option value="1">Sí</option>
                                </select>
                            </div>
                           @else
                            <div class="form-group col-md-3 col-6" id="pServicio">
                                <label for="inputServiceY">Patio de servicio</label>
                                <select id="inputServiceY" class="form-control" name="pServicio">
                                <option value="0">No</option>
                                <option selected value="1">Sí</option>
                                </select>
                            </div>
                           @endif 
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" id="pServicio" style="display:none;">
                            <label for="inputServiceY">Patio de servicio</label>
                            <select id="inputServiceY" class="form-control" name="pServicio">
                            <option selected value="0">No</option>
                            <option value="1">Sí</option>
                            </select>
                        </div>
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                           @if ($propiedad->house->service_room == 0)
                            <div class="form-group col-md-3 col-6" id="cServicio">
                                <label for="inputServiceR">Cuarto de servicio</label>
                                <select id="inputServiceR" class="form-control" name="cServicio">
                                <option selected value="0">No</option>
                                <option value="1">Sí</option>
                                </select>
                            </div>
                           @else
                            <div class="form-group col-md-3 col-6" id="cServicio">
                                <label for="inputServiceR">Cuarto de servicio</label>
                                <select id="inputServiceR" class="form-control" name="cServicio">
                                <option value="0">No</option>
                                <option selected value="1">Sí</option>
                                </select>
                            </div>
                           @endif    
                        @endif
                        @if (count($propiedad->department()->get())==1)
                           @if ($propiedad->department->service_room == 0)
                            <div class="form-group col-md-3 col-6" id="cServicio">
                                <label for="inputServiceR">Cuarto de servicio</label>
                                <select id="inputServiceR" class="form-control" name="cServicio">
                                <option selected value="0">No</option>
                                <option value="1">Sí</option>
                                </select>
                            </div>
                           @else
                            <div class="form-group col-md-3 col-6" id="cServicio">
                                <label for="inputServiceR">Cuarto de servicio</label>
                                <select id="inputServiceR" class="form-control" name="cServicio">
                                <option value="0">No</option>
                                <option selected value="1">Sí</option>
                                </select>
                            </div>
                           @endif    
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" id="cServicio" style="display:none;">
                            <label for="inputServiceR">Cuarto de servicio</label>
                            <select id="inputServiceR" class="form-control" name="cServicio">
                            <option selected value="0">No</option>
                            <option value="1">Sí</option>
                            </select>
                        </div>
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                            <div class="form-group col-md-3 col-6" id="estudios">
                                <label for="inputStudies" class="O-form-text">Estudios*</label>
                                <input value="{{$propiedad->house->home_office}}" type="number" class="form-control" id="inputStudies" min="0" placeholder="Estudios" name="estudios">
                            </div>  
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            <div class="form-group col-md-3 col-6" id="estudios">
                                <label for="inputStudies" class="O-form-text">Estudios*</label>
                                <input value="{{$propiedad->department->home_office}}" type="number" class="form-control" id="inputStudies" min="0" placeholder="Estudios" name="estudios">
                            </div>  
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" id="estudios" style="display:none;">
                            <label for="inputStudies" class="O-form-text">Estudios*</label>
                            <input value="0" type="number" class="form-control" id="inputStudies" min="0" placeholder="Estudios" name="estudios">
                        </div>  
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                            <div class="form-group col-md-3 col-6" id="cocheras">
                                <label for="inputGarages" class="O-form-text">Cocheras*</label>
                                <input value="{{$propiedad->house->garages}}" type="number" class="form-control" id="inputGarages" min="0" placeholder="Cocheras" name="cocheras">
                            </div>
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            <div class="form-group col-md-3 col-6" id="cocheras">
                                <label for="inputGarages" class="O-form-text">Cocheras*</label>
                                <input value="{{$propiedad->department->garages}}" type="number" class="form-control" id="inputGarages" min="0" placeholder="Cocheras" name="cocheras">
                            </div>
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" id="cocheras" style="display:none;">
                            <label for="inputGarages" class="O-form-text">Cocheras*</label>
                            <input value="0" type="number" class="form-control" id="inputGarages" min="0" placeholder="Cocheras" name="cocheras">
                        </div>
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->office()->get())==1 || count($propiedad->department()->get())==1 )
                        @if (count($propiedad->house()->get())==1)
                            @if ($propiedad->house->security_vigilance == 0)
                                <div class="form-group col-md-3 col-6" id="vigilancia">
                                    <label for="inputVigilance">Vigilancia</label>
                                    <select id="inputVigilance" class="form-control" name="vigilancia">
                                    <option selected value="0">No</option>
                                    <option value="1">Sí</option>
                                    </select>
                                </div>
                            @else
                                <div class="form-group col-md-3 col-6" id="vigilancia">
                                    <label for="inputVigilance">Vigilancia</label>
                                    <select id="inputVigilance" class="form-control" name="vigilancia">
                                    <option value="0">No</option>
                                    <option selected value="1">Sí</option>
                                    </select>
                                </div>
                            @endif
                        @endif
                        @if (count($propiedad->office()->get())==1)
                            @if ($propiedad->office->security_vigilance == 0)
                                <div class="form-group col-md-3 col-6" id="vigilancia">
                                    <label for="inputVigilance">Vigilancia</label>
                                    <select id="inputVigilance" class="form-control" name="vigilancia">
                                    <option selected value="0">No</option>
                                    <option value="1">Sí</option>
                                    </select>
                                </div>
                            @else
                                <div class="form-group col-md-3 col-6" id="vigilancia">
                                    <label for="inputVigilance">Vigilancia</label>
                                    <select id="inputVigilance" class="form-control" name="vigilancia">
                                    <option value="0">No</option>
                                    <option selected value="1">Sí</option>
                                    </select>
                                </div>
                            @endif
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            @if ($propiedad->department->security_vigilance == 0)
                                <div class="form-group col-md-3 col-6" id="vigilancia">
                                    <label for="inputVigilance">Vigilancia</label>
                                    <select id="inputVigilance" class="form-control" name="vigilancia">
                                    <option selected value="0">No</option>
                                    <option value="1">Sí</option>
                                    </select>
                                </div>
                            @else
                                <div class="form-group col-md-3 col-6" id="vigilancia">
                                    <label for="inputVigilance">Vigilancia</label>
                                    <select id="inputVigilance" class="form-control" name="vigilancia">
                                    <option value="0">No</option>
                                    <option selected value="1">Sí</option>
                                    </select>
                                </div>
                            @endif
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" id="vigilancia" style="display:none;">
                            <label for="inputVigilance">Vigilancia</label>
                            <select id="inputVigilance" class="form-control" name="vigilancia">
                            <option selected value="0">No</option>
                            <option value="1">Sí</option>
                            </select>
                        </div>
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->office()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                            @if ($propiedad->house->cistern == 0)
                                <div class="form-group col-md-3 col-6" id="cisterna">
                                    <label for="inputCistern">Cisterna</label>
                                    <select id="inputCistern" class="form-control" name="cisterna">
                                    <option selected value="0">No</option>
                                    <option value="1">Sí</option>
                                    </select>
                                </div> 
                            @else
                                <div class="form-group col-md-3 col-6" id="cisterna">
                                    <label for="inputCistern">Cisterna</label>
                                    <select id="inputCistern" class="form-control" name="cisterna">
                                    <option value="0">No</option>
                                    <option selected value="1">Sí</option>
                                    </select>
                                </div> 
                            @endif
                        @endif
                        @if (count($propiedad->office()->get())==1)
                            @if ($propiedad->office->cistern == 0)
                                <div class="form-group col-md-3 col-6" id="cisterna">
                                    <label for="inputCistern">Cisterna</label>
                                    <select id="inputCistern" class="form-control" name="cisterna">
                                    <option selected value="0">No</option>
                                    <option value="1">Sí</option>
                                    </select>
                                </div> 
                            @else
                                <div class="form-group col-md-3 col-6" id="cisterna">
                                    <label for="inputCistern">Cisterna</label>
                                    <select id="inputCistern" class="form-control" name="cisterna">
                                    <option value="0">No</option>
                                    <option selected value="1">Sí</option>
                                    </select>
                                </div> 
                            @endif
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            @if ($propiedad->department->cistern == 0)
                                <div class="form-group col-md-3 col-6" id="cisterna">
                                    <label for="inputCistern">Cisterna</label>
                                    <select id="inputCistern" class="form-control" name="cisterna">
                                    <option selected value="0">No</option>
                                    <option value="1">Sí</option>
                                    </select>
                                </div> 
                            @else
                                <div class="form-group col-md-3 col-6" id="cisterna">
                                    <label for="inputCistern">Cisterna</label>
                                    <select id="inputCistern" class="form-control" name="cisterna">
                                    <option value="0">No</option>
                                    <option selected value="1">Sí</option>
                                    </select>
                                </div> 
                            @endif
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" id="cisterna" style="display:none;">
                            <label for="inputCistern">Cisterna</label>
                            <select id="inputCistern" class="form-control" name="cisterna">
                            <option selected value="0">No</option>
                            <option value="1">Sí</option>
                            </select>
                        </div>   
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                            <div class="form-group col-md-3 col-6" id="antiguedad">
                                <label for="inputAnt" class="O-form-text">antigüedad*</label>
                                <input value="{{$propiedad->house->antiquity}}" type="number" class="form-control" id="inputAnt" min="0" placeholder="antigüedad" name="antiguedad">
                            </div>
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            <div class="form-group col-md-3 col-6" id="antiguedad">
                                <label for="inputAnt" class="O-form-text">antigüedad*</label>
                                <input value="{{$propiedad->department->antiquity}}" type="number" class="form-control" id="inputAnt" min="0" placeholder="antigüedad" name="antiguedad">
                            </div>
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" id="antiguedad" style="display:none;">
                            <label for="inputAnt" class="O-form-text">antigüedad*</label>
                            <input value="0" type="number" class="form-control" id="inputAnt" min="0" placeholder="antigüedad" name="antiguedad">
                        </div>
                    @endif
                    @if (count($propiedad->house()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->house()->get())==1)
                            <div class="form-group col-md-3 col-6" id="pisos">
                                <label for="inputFloors" class="O-form-text">Pisos*</label>
                                <input value="{{$propiedad->house->floors}}" type="number" class="form-control" id="inputFloors" min="0" placeholder="Pisos" name="pisos">
                            </div> 
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            <div class="form-group col-md-3 col-6" id="pisos">
                                <label for="inputFloors" class="O-form-text">Pisos*</label>
                                <input value="{{$propiedad->department->floors}}" type="number" class="form-control" id="inputFloors" min="0" placeholder="Pisos" name="pisos">
                            </div> 
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" id="pisos" style="display:none;">
                            <label for="inputFloors" class="O-form-text">Pisos*</label>
                            <input value="1" type="number" class="form-control" id="inputFloors" min="0" placeholder="Pisos" name="pisos">
                        </div>   
                    @endif
                    @if (count($propiedad->office()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->office()->get())==1)
                            <div class="form-group col-md-3 col-6" id="piso">
                                <label for="inputFloor" class="O-form-text">Piso*</label>
                                <input value="{{$propiedad->office->floor}}" type="number" class="form-control" id="inputFloor" min="0" placeholder="Piso" name="piso">
                            </div> 
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            <div class="form-group col-md-3 col-6" id="piso">
                                <label for="inputFloor" class="O-form-text">Piso*</label>
                                <input value="{{$propiedad->department->floor}}" type="number" class="form-control" id="inputFloor" min="0" placeholder="Piso" name="piso">
                            </div> 
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" id="piso" style="display:none;">
                            <label for="inputFloor" class="O-form-text">Piso*</label>
                            <input value="1" type="number" class="form-control" id="inputFloor" min="0" placeholder="Piso" name="piso">
                        </div> 
                    @endif
                    @if (count($propiedad->office()->get())==1 || count($propiedad->department()->get())==1)
                        @if (count($propiedad->office()->get())==1)
                            @if ($propiedad->office->elevator == 0)
                                <div class="form-group col-md-3 col-6" id="elevador">
                                    <label for="inputElevator">Elevador</label>
                                    <select id="inputElevator" class="form-control" name="elevador">
                                    <option selected value="0">No</option>
                                    <option value="1">Sí</option>
                                    </select>
                                </div> 
                            @else
                                <div class="form-group col-md-3 col-6" id="elevador">
                                    <label for="inputElevator">Elevador</label>
                                    <select id="inputElevator" class="form-control" name="elevador">
                                    <option value="0">No</option>
                                    <option selected value="1">Sí</option>
                                    </select>
                                </div> 
                            @endif
                        @endif
                        @if (count($propiedad->department()->get())==1)
                            @if ($propiedad->department->elevator == 0)
                                <div class="form-group col-md-3 col-6" id="elevador">
                                    <label for="inputElevator">Elevador</label>
                                    <select id="inputElevator" class="form-control" name="elevador">
                                    <option selected value="0">No</option>
                                    <option value="1">Sí</option>
                                    </select>
                                </div> 
                            @else
                                <div class="form-group col-md-3 col-6" id="elevador">
                                    <label for="inputElevator">Elevador</label>
                                    <select id="inputElevator" class="form-control" name="elevador">
                                    <option value="0">No</option>
                                    <option selected value="1">Sí</option>
                                    </select>
                                </div> 
                            @endif
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" id="elevador" style="display:none;">
                            <label for="inputElevator">Elevador</label>
                            <select id="inputElevator" class="form-control" name="elevador">
                            <option selected value="0">No</option>
                            <option value="1">Sí</option>
                            </select>
                        </div> 
                    @endif
                    @if (count($propiedad->warehouse()->get())==1)
                        @if ($propiedad->warehouse->office == 0)
                            <div class="form-group col-md-3 col-6" id="oficina">
                                <label for="inputElevator">Oficina</label>
                                <select id="inputElevator" class="form-control" name="oficina">
                                <option selected value="0">No</option>
                                <option value="1">Sí</option>
                                </select>
                            </div>
                        @else
                            <div class="form-group col-md-3 col-6" id="oficina">
                                <label for="inputElevator">Oficina</label>
                                <select id="inputElevator" class="form-control" name="oficina">
                                <option value="0">No</option>
                                <option selected value="1">Sí</option>
                                </select>
                            </div>
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" id="oficina" style="display:none;">
                            <label for="inputElevator">Oficina</label>
                            <select id="inputElevator" class="form-control" name="oficina">
                            <option selected value="0">No</option>
                            <option value="1">Sí</option>
                            </select>
                        </div>   
                    @endif
                    @if (count($propiedad->terrain()->get())==1)
                        @if ($propiedad->terrain->access_roads == 0)
                            <div class="form-group col-md-3 col-6" id="acceso">
                                <label for="inputAccess">Acceso a carretera</label>
                                <select id="inputAccess" class="form-control" name="acceso">
                                <option selected value="0">No</option>
                                <option value="1">Sí</option>
                                </select>
                            </div> 
                        @else
                            <div class="form-group col-md-3 col-6" id="acceso">
                                <label for="inputAccess">Acceso a carretera</label>
                                <select id="inputAccess" class="form-control" name="acceso">
                                <option value="0">No</option>
                                <option selected value="1">Sí</option>
                                </select>
                            </div>
                        @endif
                    @else
                        <div class="form-group col-md-3 col-6" id="acceso" style="display:none;">
                            <label for="inputAccess">Acceso a carretera</label>
                            <select id="inputAccess" class="form-control" name="acceso">
                            <option selected value="0">No</option>
                            <option value="1">Sí</option>
                            </select>
                        </div> 
                    @endif
                    <div class="form-group w-100">
                        <label for="inputDescription">Descripción*</label>
                        <textarea class="form-control pt-4  w-md-auto w-100" id="inputDescription" rows="3" placeholder="Descripción" Required name="descripcion">{{$propiedad->description}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row d-flex flex-wrap ps-1 pe-1">
                <div class="col-md-7 col-12">
                    <div class="form-group w-100">
                        <label for="inputInfo" class="font-weight-bold">Información de contacto</label>
                        <textarea class="form-control pt-4  w-md-auto w-100" id="inputInfo" rows="3" placeholder="Información de contacto" Required name="info">{{$propiedad->owner_info}}</textarea>
                    </div>
                </div>
                <div class="col-md-5 col-12 d-flex justify-content-end align-items-end mt-mb-0 mt-3">
                    <a href="" class="O-btn-cancel ">Cancelar</a>
                    <button type="submit" class="O-btn-save">Guardar</button>
                </div> 
            </div>
        </form>
        <div class="row">
            <div class="admin_delete_prop" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Eliminar inmueble
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Inmueble</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este inmueble? ¡Todos los datos de la propiedad se perderán!
            </div>
            <form class="modal-footer" method="post" action="{{ route('eliminarPropiedad',['id'=>Crypt::encrypt($propiedad->id)]) }}">
                @method('DELETE')
                @csrf
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">¡Sí, eliminar!</button>
            </form>
        </div>
    </div>
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
@endsection