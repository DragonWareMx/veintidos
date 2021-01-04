@extends('layouts.publiSide')
@section('title')
    ¿Quiénes somos?
@endsection
@section('head')
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/O.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/quienesSomos.css') }}">
    {{-- OWL CAROUSEL --}}
    <link rel="stylesheet" href="{{ asset('/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">
    
    <script src="{{ asset('/plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>
    
    <style>
        .owl-w{
            width: 95%;
        }
        .pswp {
            z-index: 99999;
        }
    </style>
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
    <div class="Odiv100 d-block" style="margin-bottom: 25px">
      <div class="Otitle"><h1>¿QUIÉNES SOMOS?</h1></div>
    </div>
    <div class="div_vision_mision">
        <div class="div_txt_info">
          <div class="div_titleQuote"> 
            <img src="{{asset('/img/ico/quote.png')}}" class="float-start">
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
                    <img src="{{asset('/img/img3.jpg')}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item" data-bs-interval="4000">
                    <img src="{{asset('/img/img2.png')}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item" data-bs-interval="4000">
                    <img src="{{asset('/img/img4.png')}}" class="d-block w-100" alt="...">
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

    <div>
      <h1 style="text-align: center">NOVEDADES</h1> 
      <hr style="color:gray: width:400px; margin-bottom:0px">
      <div class="owl-carousel owl-theme" style="margin-bottom:3%; margin-top:2%">
          @foreach ($propiedades as $propiedad)
              <div class="olw-item" style="margin:3%">
                      {{-- TARJETA DE LA PROPIEDAD --}}
                      <div class="border rounded-bottom shadow-sm bg-white">
                          <div style="height:auto; min-height: 330px; line-height: 12px !important;">
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
                              <a href="{{route('propiedad', ['id'=>Crypt::encrypt($propiedad->id)])}}" style="text-decoration: none">
                                  <h6 class="px-2 pt-1 text-blue22" style="font-weight: 600; min-height: 52px;"> 
                                      {{ \Illuminate\Support\Str::limit($propiedad->title, $limit = 65, $end = '...') }}
                                  </h6>    
                              </a>
                              {{-- PRECIO Y CLAVE --}}
                              <div class="row align-items-end px-2">
                                  <div class="col-7 text-left">
                                      <p class="m-1">${{number_format($propiedad->price,2)}} </p>
                                  </div>
                                  <div class="col-5 text-right">
                                      <p class="m-1">Clave: <b>{{str_pad($propiedad->id, 4, '0', STR_PAD_LEFT)}}</b></p>
                                  </div>
                              </div>
                          </div>
                      </div>
              </div>
          @endforeach
      </div>
  </div>
  
  <script>
      $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:false,
      autoplay:true,
      autoplayTimeout:2500,
      autoplayHoverPause:true,
      
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:5
          }
      }
      });
      function opcion(option){
          switch(option){
              case "form":
                  location.href="/contactanos";
              break;
              case "next":
                  btn1=document.getElementById("btn1");
                  btn2=document.getElementById("btn2");
                  btn1.innerHTML=" <p class='btn_txt'>Comprar </p>";
                  btn2.innerHTML="<p class='btn_txt'>Rentar </p>";
                  document.getElementById("hola").innerHTML="¡CASI LISTOS!";
                  document.getElementById("txt_hi").innerHTML="Me interesa...";
                  btn1.setAttribute("onclick", "opcion('comprar')");
                  btn2.setAttribute("onclick", "opcion('rentar')");
                  document.getElementById("back").style.display="block";
              break;
              case 'rentar':
                  location.href="/propiedades?deal=rent";
              break;
              case 'comprar':
                  location.href="/propiedades?deal=sale";
              break;
              case 'volver':
                  btn1=document.getElementById("btn1");
                  btn2=document.getElementById("btn2");
                  btn1.innerHTML="<p class='btn_txt'>Quiero comprar o rentar una propiedad</p>";
                  btn2.innerHTML="<p class='btn_txt'>Quiero vender o rentar mi propiedad</p>";
                  document.getElementById("hola").innerHTML="¡BIENVENIDO!";
                  document.getElementById("txt_hi").innerHTML="Selecciona una opción para continuar";
                  btn1.setAttribute("onclick", "opcion('next')");
                  btn2.setAttribute("onclick", "opcion('form')");
                  document.getElementById("back").style.display="none";
              break;       
          }
      }
  
      if (screen.width < 700){
          btn1=document.getElementById("btn1");
          btn2=document.getElementById("btn2");
          btn1.innerHTML="<p class='btn_txt'>Comprar o rentar</p>";
          btn2.innerHTML="<p class='btn_txt'>Vender u ofrecer en renta</p>";
      } 
  </script>






    <h1 class="h1 text-center" id="1" style="margin-top: 50px;">NOSOTROS</h1>

    <div class="div_vision_mision div_que_hacemos">
      <img src="{{asset('/img/que_hacemos.jpg')}}" class="float-start">
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
        <img class="img_big" src="{{asset('/img/img1.jpg')}}">
        {{-- <img class="img_small" src="/img/whiteHouse.jpg"> --}}
      </div>  
    </div>

    <h1 class="h1 text-center" style="margin-top: 50px; margin-bottom:30px">OTROS SERVICIOS</h1>
    <div class="div_vision_mision div_busqueda" style="padding: 0%; flex-wrap:wrap">
      <div class="div_25">
        <img class="img_big" src="{{asset('/img/service1.jpg')}}">
      </div>
      <div class="div_25 text-center div_25-txt">
        <p class="txt-numberS">1</p>
        <p><b>Consultoria</b></p>
        <p>Consultoría en la elaboración de contratos de arrendamiento.
        </p>
      </div>
      <div class="div_25">
        <img class="img_big" src="{{asset('/img/service2.jpg')}}">
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
        <img class="img_big" src="{{asset('/img/service3.jpg')}}">
      </div>
      <div class="div_25 text-center div_25-txt">
        <p class="txt-numberS">4</p>
        <p><b>Asesoría</b></p>
        <p>Asesoría y trámites en alineamientos, número oficial, licencias de uso de suelo.
      </div>
      <div class="div_25">
        <img class="img_big" src="{{asset('/img/service4.jpg')}}">
      </div>
    </div>
    <div class="text-center" style="margin-top: 40px; margin-bottom:40px">
      <a href="/contactanos"><button type="button" class="btn btn-outline-primary text-center">CONTÁCTANOS<i class="fas fa-caret-right"></i></button></a>
    </div>


<script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
@endsection