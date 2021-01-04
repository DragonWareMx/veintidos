@extends('layouts.admin')

@section('title')
Propiedades - Veintidós
@endsection

@section('head')
<link rel="stylesheet" href="{{ asset('/css/sideBar.css') }}">
<link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('/css/adminPropiedades.css') }}">
@endsection

@section('navbar')
<a class="navbar-brand" onclick="history.go(-1)" style="cursor: pointer;">
    <img src="{{ asset('img/sistema/backwhite.png') }}" alt="" style="height:23px;width:20px">
    &nbsp; Propiedades
  </a>
@endsection

@section('content')
<form action="/admin/propiedades" class="barra-busqueda barra-admin" method="get">
    <div class="search-50 left">
        <select name="deal" id="" class="options-search">
            <option value="" selected disabled hidden>Venta o Renta</option>
            <option value="sale">Venta</option>
            <option value="rent">Renta</option>
        </select>
        <select name="tipo" id="" class="options-search">
            <option value="" selected disabled hidden>Tipo</option>
            <option value="casas">Casas</option>
            <option value="departamentos">Departamentos</option>
            <option value="locales">Locales</option>
            <option value="oficinas">Oficinas</option>
            <option value="terrenos">Terrenos</option>
            <option value="bodegas">Bodegas</option>
        </select>
        <select name="precio" id="" class="options-search">
            <option value="" selected disabled>Precio</option>
            <option value="2000,5000">$2,000 - $5,000</option>
            <option value="5000,10000">$5,000 - $10,000</option>
            <option value="10000,20000">$10,000 - $20,000</option>
            <option value="20000,50000">$20,000 - $50,000</option>
            <option value="50000,100000">$50,000 - $100,000</option>
            <option value="100000,200000">$100,000 - $200,000</option>
            <option value="200000,500000">$200,000 - $500,000</option>
            <option value="500000,1000000">$500,000 - $1,000,000</option>
            <option value="1000000,2000000">$1,000,000 - $2,000,000</option>
            <option value="2000000,9999999">$2,000,000 o superior</option>
        </select>
    </div>
    <div class="search-50 right">
        <input type="text" name="busqueda" id="busqueda" class="cuadro-busqueda options-search">
        <input type="image" src="{{ asset('/img/ico/buscar.png') }}" alt="Submit Form" class="search-button" />
    </div>
</form>
<div class="content-admin">
    <a href="{{Route('agregarPropiedad')}}" class="admin_top_link">Agregar propiedad</a>
</div>
<div class="row">
    @if (session()->get('status'))
        <ul class="alert alert-success" style="margin-top:15px;">
            <li>{{session()->get('status')}}</li>
        </ul>
    @endif
</div>
<div class="row" style="margin-bottom:77px;">
    @foreach ($propiedades as $propiedad)
        {{-- NOS SIRVE PARA SABER QUÉ TIPO DE PROPIEDAD ES--}}
        @php
            $tipo;
        @endphp

        @if ($propiedad->house()->exists())
            @php
                $tipo = 'CASA';
            @endphp
        @elseif ($propiedad->department()->exists())
            @php
                $tipo = 'DEPARTAMENTO';
            @endphp
        @elseif ($propiedad->terrain()->exists())
            @php
                $tipo = 'TERRENO';
            @endphp
        @elseif ($propiedad->warehouse()->exists())
            @php
                $tipo = 'BODEGA';
            @endphp
        @elseif ($propiedad->office()->exists())
            @php
                if ($propiedad->office->type == 'office') {
                    $tipo = 'OFICINA';
                }
                else {
                    $tipo = 'LOCAL';
                }
            @endphp
        @endif
        <div class="col-12 col-md-6 col-lg-4 mt-4">
            {{-- TARJETA DE LA PROPIEDAD --}}
            <div class="border rounded-bottom shadow bg-white">
                <div style="height:auto; min-height: 470px; line-height: 12px !important;">
                    {{-- IMAGEN --}}
                    <div  style="
                    background: url('{{ asset($propiedad->photo)}}') no-repeat center center;
                    background-size: cover;
                    height:220px;">
                        {{-- DIRECCION Y FOTOS --}}
                        <div class="row h-100 align-items-end">
                            <div class="col-8 text-left">
                                <img class="d-inline mb-1 ml-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/ubicacion.png')}}" alt="">
                                <p class="my-1 d-inline text-white" style="text-shadow: 1px 1px 3px black; font-weight: 500;">{{$propiedad->suburb}}, {{$propiedad->city}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <img class="d-inline mb-1" style="width:16px; height:auto; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.4));" src="{{ asset('img/ico/images.png')}}" alt="">
                                <p class="m-1 d-inline text-white font-weight-bold" style="text-shadow: 1px 1px 3px black; font-weight: 500;">{{count($propiedad->photos()->get()) + 1}}</p>
                            </div>
                        </div>
                    </div>
                    {{-- DATOS --}}
                    {{-- TITULO --}}
                    <a href="{{ route('editarPropiedad',['id'=>$propiedad->id])}}" style="text-decoration: none;">
                        <h5 class="px-2 pt-1 text-blue22" style="font-weight: 600; min-height: 52px;">
                            {{ \Illuminate\Support\Str::limit($propiedad->title, $limit = 65, $end = '...') }}
                        </h5>
                    </a>
                    {{-- PRECIO Y CLAVE --}}
                    <div class="row align-items-end px-2">
                        <div class="col-7 text-left">
                            <p class="m-1" style="font-weight:bold; color:#448B23;font-size:16px;">${{number_format($propiedad->price,2)}} </p>
                        </div>
                        <div class="col-5 text-right">
                            <p class="m-1">Clave: <b>{{str_pad($propiedad->id, 4, '0', STR_PAD_LEFT)}}</b></p>
                        </div>
                    </div>

                    @switch($tipo)
                    @case('CASA')
                        {{-- ESTADO / TIPO / TERRENO --}}
                        <div class="row px-2 mt-4">
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                @if ($propiedad->deal == 'sale')
                                    <b>Venta</b>
                                @else
                                    <b>Renta</b>
                                @endif
                            </div>
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/casa.png')}}" alt="">
                                <b>Casa</b>
                            </div>
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/terreno2.png')}}" alt="">
                                <b>{{ $propiedad->house->terrain }} m<sup>2</sup></b>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Estado
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Tipo
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Terreno
                                </p>
                            </div>
                        </div>
                        {{-- RECAMARAS / BAÑOS / CONSTRUCCION --}}
                        <div class="row px-2">
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cama.png')}}" alt="">
                                <b>{{ $propiedad->house->bedrooms }}</b>
                            </div>
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt="">
                                <b>{{ $propiedad->house->bathrooms }}</b>
                            </div>
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                                <b>{{ $propiedad->house->construction }} m<sup>2</sup></b>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Recámaras
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Baños Completos
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Construcción
                                </p>
                            </div>
                        </div>
                        @break
                    @case('DEPARTAMENTO')
                        {{-- ESTADO / TIPO / ELEVADOR --}}
                        <div class="row px-2 mt-4">
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                @if ($propiedad->deal == 'sale')
                                    <b>Venta</b>
                                @else
                                    <b>Renta</b>
                                @endif
                            </div>
                            <div class="col">
                                <b>Departamento</b>
                            </div>
                            <div class="col">
                                @if ($propiedad->department->elevator)
                                    <b>Si</b>
                                @else
                                    <b>No</b>
                                @endif
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Estado
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Tipo
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Elevador
                                </p>
                            </div>
                        </div>
                        {{-- RECAMARAS / BAÑOS / CONSTRUCCION --}}
                        <div class="row px-2">
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cama.png')}}" alt="">
                                <b>{{ $propiedad->department->bedrooms }}</b>
                            </div>
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt="">
                                <b>{{ $propiedad->department->bathrooms }}</b>
                            </div>
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                                <b>{{ $propiedad->department->construction }} m<sup>2</sup></b>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Recámaras
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Baños completos
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Construcción
                                </p>
                            </div>
                        </div>
                        @break
                    @case('TERRENO')
                        {{-- ESTADO / TIPO / TERRENO --}}
                        <div class="row px-2 mt-4">
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                @if ($propiedad->deal == 'sale')
                                    <b>Venta</b>
                                @else
                                    <b>Renta</b>
                                @endif
                            </div>
                            <div class="col">
                                <b>Terreno</b>
                            </div>
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/terreno2.png')}}" alt="">
                                <b>{{ $propiedad->terrain->terrain }} m<sup>2</sup></b>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Estado
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Tipo
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Terreno
                                </p>
                            </div>
                        </div>
                        {{-- Acceso a vialidades --}}
                        <div class="row px-2 mt-2">
                            <div class="col">
                                @if ($propiedad->terrain->access_roads)
                                    <b>Si</b>
                                @else
                                    <b>No</b>
                                @endif
                            </div>
                            <div class="col">
                                
                            </div>
                            <div class="col">
                                
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Acceso a Vialidades
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    
                                </p>
                            </div>
                        </div>
                        @break
                    @case('BODEGA')
                        {{-- ESTADO / TIPO / TERRENO --}}
                        <div class="row px-2 mt-4">
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                @if ($propiedad->deal == 'sale')
                                    <b>Venta</b>
                                @else
                                    <b>Renta</b>
                                @endif
                            </div>
                            <div class="col">
                                <b>Bodega</b>
                            </div>
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/terreno2.png')}}" alt="">
                                <b>{{ $propiedad->warehouse->terrain }} m<sup>2</sup></b>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Estado
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Tipo
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Terreno
                                </p>
                            </div>
                        </div>
                        {{-- MEDIOS BAÑOS / OFICINA / CONSTRUCCION --}}
                        <div class="row px-2">
                            <div class="col">
                                <b>{{ $propiedad->warehouse->half_bathrooms }}</b>
                            </div>
                            <div class="col">
                                @if ($propiedad->warehouse->office)
                                    <b>Si</b>
                                @else
                                    <b>No</b>
                                @endif
                            </div>
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                                <b>{{ $propiedad->warehouse->construction }} m<sup>2</sup></b>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Medios Baños
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Oficina
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Construcción
                                </p>
                            </div>
                        </div>
                        @break
                    @case('OFICINA')
                        {{-- ESTADO / TIPO / CONSTRUCCION --}}
                        <div class="row px-2 mt-4">
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                @if ($propiedad->deal == 'sale')
                                    <b>Venta</b>
                                @else
                                    <b>Renta</b>
                                @endif
                            </div>
                            <div class="col">
                                <b>Oficina</b>
                            </div>
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                                <b>{{ $propiedad->office->construction }} m<sup>2</sup></b>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Estado
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Tipo
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Elevador
                                </p>
                            </div>
                        </div>
                        {{-- MEDIOS BAÑOS / CISTERNA / ELEVADOR --}}
                        <div class="row px-2">
                            <div class="col">
                                <b>{{ $propiedad->office->half_bathrooms }}</b>
                            </div>
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cistern.png')}}" alt="">
                                @if ($propiedad->office->cistern)
                                    <b>Si</b>
                                @else
                                    <b>No</b>
                                @endif
                            </div>
                            <div class="col">
                                @if ($propiedad->office->elevator)
                                    <b>Si</b>
                                @else
                                    <b>No</b>
                                @endif
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Medios Baños
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Cisterna
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Elevador
                                </p>
                            </div>
                        </div>
                        @break
                    @case('LOCAL')
                        {{-- ESTADO / TIPO / CONSTRUCCION --}}
                        <div class="row px-2 mt-4">
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                                @if ($propiedad->deal == 'sale')
                                    <b>Venta</b>
                                @else
                                    <b>Renta</b>
                                @endif
                            </div>
                            <div class="col">
                                <b>Local</b>
                            </div>
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                                <b>{{ $propiedad->office->construction }} m<sup>2</sup></b>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Estado
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Tipo
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Elevador
                                </p>
                            </div>
                        </div>
                        {{-- MEDIOS BAÑOS / CISTERNA / ELEVADOR --}}
                        <div class="row px-2">
                            <div class="col">
                                <b>{{ $propiedad->office->half_bathrooms }}</b>
                            </div>
                            <div class="col">
                                <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cistern.png')}}" alt="">
                                @if ($propiedad->office->cistern)
                                    <b>Si</b>
                                @else
                                    <b>No</b>
                                @endif
                            </div>
                            <div class="col">
                                @if ($propiedad->office->elevator)
                                    <b>Si</b>
                                @else
                                    <b>No</b>
                                @endif
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Medios Baños
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Cisterna
                                </p>
                            </div>
                            <div class="col">
                                <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                    Elevador
                                </p>
                            </div>
                        </div>
                        @break
                    @default
                        
                @endswitch

                    {{-- DATOS PRINCIPALES --}}
                    {{-- <div class="row px-2 mt-4">
                        <div class="col">
                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/estado.png')}}" alt="">
                            @if ($propiedad->deal=='sale')
                                <b>Venta</b>
                            @else
                                <b>Renta</b>
                            @endif
                        </div>
                        <div class="col">
                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/casa.png')}}" alt="">
                            @if (count($propiedad->house()->get())==1)
                                <b>Casa</b>
                            @elseif (count($propiedad->department()->get())==1)
                                <b>Depa.</b>
                            @elseif (count($propiedad->terrain()->get())==1)
                                <b>Terreno</b>
                            @elseif (count($propiedad->warehouse()->get())==1)
                                <b>Bodega</b>
                            @elseif (count($propiedad->office()->get())==1)
                                <b>Oficina</b>
                            @endif
                        </div>
                        <div class="col">
                            
                        </div>
                    </div>
                    <div class="row px-2">
                        <div class="col">
                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                Estado
                            </p>
                        </div>
                        <div class="col">
                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                Tipo
                            </p>
                        </div>
                        <div class="col">
                            
                        </div>
                    </div>
                    <div class="row px-2">
                        <div class="col">
                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/cama.png')}}" alt="">
                            <b>
                                @if (count($propiedad->house()->get())==1)
                                    {{$propiedad->house->bedrooms}}
                                @elseif (count($propiedad->department()->get())==1)
                                    {{$propiedad->department->bedrooms}}
                                @elseif (count($propiedad->terrain()->get())==1)
                                    0
                                @elseif (count($propiedad->warehouse()->get())==1)
                                    0
                                @elseif (count($propiedad->office()->get())==1)
                                    0
                                @endif 
                            </b>
                        </div>
                        <div class="col">
                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/bath.png')}}" alt="">
                            <b>
                                @if (count($propiedad->house()->get())==1)
                                    {{$propiedad->house->bathrooms}}
                                @elseif (count($propiedad->department()->get())==1)
                                    {{$propiedad->department->bathrooms}}
                                @elseif (count($propiedad->terrain()->get())==1)
                                    0
                                @elseif (count($propiedad->warehouse()->get())==1)
                                    0
                                @elseif (count($propiedad->office()->get())==1)
                                    {{$propiedad->department->half_bathrooms}}
                                @endif 
                            </b>
                        </div>
                        <div class="col">
                            <img class="d-inline mb-1" style="width:16px; height:auto;" src="{{ asset('img/ico/construccion.png')}}" alt="">
                            @if (count($propiedad->house()->get())==1)
                                <b>{{$propiedad->house->construction}} m<sup>2</sup></b>
                            @elseif (count($propiedad->department()->get())==1)
                                <b>{{$propiedad->department->construction}} m<sup>2</sup></b>
                            @elseif (count($propiedad->terrain()->get())==1)
                                <b>{{$propiedad->terrain->terrain}} m<sup>2</sup></b>
                            @elseif (count($propiedad->warehouse()->get())==1)
                                <b>{{$propiedad->warehouse->construction}} m<sup>2</sup></b>
                            @elseif (count($propiedad->office()->get())==1)
                                <b>{{$propiedad->office->construction}} m<sup>2</sup></b>
                            @endif 
                        </div>
                    </div>
                    <div class="row px-2">
                        <div class="col">
                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                Recámara
                            </p>
                        </div>
                        <div class="col">
                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                Baños
                            </p>
                        </div>
                        <div class="col">
                            <p class="font-weight-light pt-1" style="color: #818181; font-size: 12px; line-height:5px;">
                                Construcción
                            </p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col my-5">
            {{ $propiedades->links() }}
        </div>
    </div>
</div>
@endsection