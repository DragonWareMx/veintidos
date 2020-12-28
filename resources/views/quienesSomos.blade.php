@extends('layouts.publiSide')
@section('title')
    ¿Quiénes somos?
@endsection
@section('head')
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/quienesSomos.css') }}">
    <script languague="javascript">
      function mostrar() {
          div = document.getElementById('info-more');
          but1 = document.getElementById('button-more')
          but2 = document.getElementById('button-less')
          but1.style.display = 'none';
          but2.style.display = 'block';
          div.style.display = 'block';
      }
    
      function cerrar() {
          div = document.getElementById('info-more');
          but2 = document.getElementById('button-less')
          but1 = document.getElementById('button-more')
          but1.style.display = 'block';
          but2.style.display = 'none';
          div.style.display = 'none';
      }
    </script>
@endsection
@section('content')

    <h1 class="h1 text-center">¿QUIÉNES SOMOS?</h1>
    <div class="div_vision_mision">
        <div class="div_txt_info">
          <div class="div_titleQuote">
            <img src="/img/ico/quote.png" class="float-start">
            <p class="txt-titleQ">NUESTRA <b>MISIÓN Y VISIÓN</b></p>
          </div>
          <p class="txt-info-q">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor 
            incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
            laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse 
            cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa 
            qui officia deserunt mollit anim id est laborum.</p>
          <a href="#1" >Saber más</a>
        </div>

        <div class="div_carrousel">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="4000">
                    <img src="/img/img3.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item" data-bs-interval="4000">
                    <img src="/img/img2.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item" data-bs-interval="4000">
                    <img src="/img/img4.png" class="d-block w-100" alt="...">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Siguiente</span>
                </a>
            </div>
        </div>
    </div>

    <h1 class="h1 text-center" id="1" style="margin-top: 50px;">¿QUÉ HACEMOS?</h1>

    <div class="div_vision_mision div_que_hacemos">
      <img src="/img/que_hacemos.jpg" class="float-start">
      <div class="div_info_q">
        <p class="txt-titleQ" style="color: white">PROMOCIÓN DE TUS <b>PROPIEDADES</b></p>
        <p style="color: white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod 
          tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
          exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. </p>
        <ol>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
        </ol>
        <p style="color: white" id="info-more">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod 
          tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
          exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. </p>
        <a href="javascript:mostrar();" id="button-more"><button type="button" class="btn btn-outline-secondary" style="margin-bottom: 15px">LEER MÁS<i class="fas fa-caret-right"></i></button></a>
        <a href="javascript:cerrar();" id="button-less"><button type="button" class="btn btn-outline-secondary" style="margin-bottom: 15px">LEER MENOS<i class="fas fa-caret-right"></i></button></a>
      </div>      
    </div>
    <div class="div_vision_mision div_busqueda">
      <div class="div_info_busqueda">
        <p class="txt-titleQ txt-busquedaT" style="color:#222B58">BÚSQUEDA DE <b>PROPIEDADES</b></p>
        <p style="width:100%">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor 
          incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
          ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate 
          velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, 
          sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="/inicio" style="float: right"><button type="button" class="btn btn-outline-primary">COMENZAR<i class="fas fa-caret-right"></i></button></a>
      </div>
      <div class="div_imgb">
        <img class="img_big" src="/img/img1.jpg">
        {{-- <img class="img_small" src="/img/whiteHouse.jpg"> --}}
      </div>  
    </div>

    <h1 class="h1 text-center" style="margin-top: 50px; margin-bottom:30px">OTROS SERVICIOS</h1>
    <div class="div_vision_mision div_busqueda" style="padding: 0%; flex-wrap:wrap">
      <div class="div_25">
        <img class="img_big" src="/img/service1.jpg">
      </div>
      <div class="div_25 text-center div_25-txt">
        <p class="txt-numberS">1</p>
        <p><b>Lorem ipsum dolor sit amet</b></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor 
          incidunt ut labore et dolore magna aliqua.
        </p>
      </div>
      <div class="div_25">
        <img class="img_big" src="/img/service2.jpg">
      </div>
      <div class="div_25 text-center div_25-txt">
        <p class="txt-numberS">2</p>
        <p><b>Lorem ipsum dolor sit amet</b></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor 
          incidunt ut labore et dolore magna aliqua.
      </div>

      <div class="div_25 text-center div_25-txt">
        <p class="txt-numberS">3</p>
        <p><b>Lorem ipsum dolor sit amet</b></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor 
          incidunt ut labore et dolore magna aliqua.
      </div>
      <div class="div_25">
        <img class="img_big" src="/img/service3.jpg">
      </div>
      <div class="div_25 text-center div_25-txt">
        <p class="txt-numberS">4</p>
        <p><b>Lorem ipsum dolor sit amet</b></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor 
          incidunt ut labore et dolore magna aliqua.
      </div>
      <div class="div_25">
        <img class="img_big" src="/img/service4.jpg">
      </div>
    </div>
    <div class="text-center" style="margin-top: 40px; margin-bottom:40px">
      <a href="/contactanos"><button type="button" class="btn btn-outline-primary text-center">CONTÁCTANOS<i class="fas fa-caret-right"></i></button></a>
    </div>


<script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
@endsection