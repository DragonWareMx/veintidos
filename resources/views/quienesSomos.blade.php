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
          <p class="txt-info-q">Estamos conscientes que la compra y/o venta de inmuebles son decisiones patrimoniales de gran trascendencia en la vida; es por ello que le brindamos un servicio de alta calidad.
            Somos una empresa del Estado de Michoacán, dispuestos a brindarle un servicio personalizado, confidencial y de calidad para ayudarle con su operación inmobiliaria. 
            <br>
            Nuestra misión es mantener excelencia en el servicio a través de nuestro equipo de trabajo, con ética y profesionalismo en un ambiente de respeto, confidencialidad y confianza. 
            Generando clientes satisfechos que nos recomienden en la administración de inmuebles, compra o venta de sus propiedades, facilitando sus procesos de una manera integral y superando sus expectativas.</p>
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
        <p class="txt-titleQ" style="color: white">NUESTROS <b>VALORES</b></p>
        <ol class="agrandamiento">
          <li>Honestidad</li>
          <li>Integridad</li>
          <li>Responsabilidad</li>
          <li>Respeto</li>
          <li>Discreción</li>
          <li>Servicio</li>
          <li>Solidaridad</li>
        </ol>
        <p style="color: white" id="info-more" class="agrandamiento" style="font-size:20px">Estamos comprometidos con tu familia y sabemos la importancia de encontrar un hogar o un lugar para desarrollar tus actividades laborales. Nuestro objetivo es que encuentres un sitio adecuado, 
              seguro y con las características ideales para tu familia o negocio conforme a tus necesidades.</p>
        <a href="javascript:mostrar();" id="button-more"><button type="button" class="btn btn-outline-secondary" style="margin-bottom: 15px">LEER MÁS<i class="fas fa-caret-right"></i></button></a>
        <a href="javascript:cerrar();" id="button-less"><button type="button" class="btn btn-outline-secondary" style="margin-bottom: 15px">LEER MENOS<i class="fas fa-caret-right"></i></button></a>
      </div>      
    </div>
    <div class="div_vision_mision div_busqueda">
      <div class="div_info_busqueda">
        <p class="txt-titleQ txt-busquedaT" style="color:#222B58">BÚSQUEDA DE <b>PROPIEDADES</b></p>
        <p style="width:100%">Te ayudamos a encontrar la casa de tus sueños. En nuestro sitio puedes buscar inmuebles para comprar o rentar, elige la ciudad, el rango de precios y mándanos tu solicitud. Estaremos encantados de ayudarte a encontrar tu hogar ideal.</p>
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
        <p><b>Consultoria</b></p>
        <p>Consultoría en la elaboración de contratos de arrendamiento.
        </p>
      </div>
      <div class="div_25">
        <img class="img_big" src="/img/service2.jpg">
      </div>
      <div class="div_25 text-center div_25-txt">
        <p class="txt-numberS">2</p>
        <p><b>Avalúos de tu propiedad.</b></p>
        <p>Te ayudamos a saber cuanto cuesta tu inmueble.
      </div>

      <div class="div_25 text-center div_25-txt">
        <p class="txt-numberS">3</p>
        <p><b>Orientación</b></p>
        <p>Orientación en tu trámite de crédito hipotecario (ISSSTE, Infonavit e Instituciones Bancarias).
      </div>
      <div class="div_25">
        <img class="img_big" src="/img/service3.jpg">
      </div>
      <div class="div_25 text-center div_25-txt">
        <p class="txt-numberS">4</p>
        <p><b>Asesoría</b></p>
        <p>Asesoría y trámites en alineamientos, número oficial, licencias de uso de suelo.
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