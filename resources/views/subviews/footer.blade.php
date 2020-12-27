<footer>
    <div class="container-body">
        <div class="column1">
            <img src="{{ asset('/img/logos/transparente-cut.png') }}">
            <h1>VEINTIDÓS GRUPO INMOBILIARIO</h1>
            <div class="linea_c1"></div>
            <p class="slogan">Slogan lorem ipsum dolor sit amet consectetur adipiscing elit</p>
        </div>
        <div class="column2">
            <h4>PROPIEDADES</h4>
            <a href="/propiedades?deal=sale" class="enlace-footer">Compra</a>
            <a href="/propiedades?deal=rent" class="enlace-footer">Renta</a>
            <a href="/propiedades?tipo=casas" class="enlace-footer">Casas</a>
            <a href="/propiedades?tipo=terrenos" class="enlace-footer">Terrenos</a>
            <a href="/propiedades?tipo=departamentos" class="enlace-footer">Departamentos</a>
        </div>
        <div class="column3">
            <h4>NOSOTROS</h4>
            <a href="{{route('quienesSomos')}}" class="enlace-footer">¿Quiénes somos?</a>
            <br><br>
            <h4>CONTÁCTANOS</h4>
            <a href="" class="enlace-footer"><i class="fas fa-phone-alt"></i>&nbsp; Tel. 4433370550</a>
            <a href="" class="enlace-footer"><i class="fas fa-envelope"></i>&nbsp; contacto@veintidos.mx</a>
        </div>
        <div class="column4">
            <a href="https://www.facebook.com/Veintid%C3%B3s-Grupo-Inmobiliario-103029468239947/"><img src="{{ asset('/img/ico/fb.png') }}"></a>
            <a href="https://www.instagram.com/invites/contact/?i=1081ovoalpm0j&utm_content=jygx2jj"><img src="{{ asset('/img/ico/ig.png') }}"></a>
            <a href=""><img src="{{ asset('/img/ico/whats.png') }}"></a>

            <a href="" class="enlace-footer">Aviso de privacidad</a>
            <a href="" class="enlace-footer">Términos y condiciones</a>
        </div>
    </div>
    <div class="container-footer">
        <p>Copyright © 2020 Veintidós.</p>
        <a href="https://dragonware.com.mx" target="_blank">
            <p>Desarrollado por DragonWare. <img src="{{ asset('/img/ico/dragonblanco.png') }}" width="14px" height="14px"></p>        
        </a>
    </div>
</footer>