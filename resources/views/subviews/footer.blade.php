<footer>
    <div class="container-body">
        <div class="column1">
            <img src="{{ asset('/img/logos/transparente-cut.png') }}">
            <h1>VEINTIDÓS GRUPO INMOBILIARIO</h1>
            <div class="linea_c1"></div> 
            <p class="slogan">De la mano contigo para apoyarte en tus decisiones patrimoniales.</p>
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
            <a href="tel:4433370550" class="enlace-footer"><i class="fas fa-phone-alt"></i>&nbsp; Tel. 4433370550</a>
            <a href="mailto:contacto@veintidos.mx" class="enlace-footer"><i class="fas fa-envelope"></i>&nbsp; contacto@veintidos.com.mx</a>
        </div>
        <div class="column4">
            <a href="https://www.facebook.com/Veintid%C3%B3s-Grupo-Inmobiliario-103029468239947/" target="_blank"><img src="{{ asset('/img/ico/fb.png') }}"></a>
            <a href="https://www.instagram.com/veintidosgrupoinmobiliario/" target="_blank"><img src="{{ asset('/img/ico/ig.png') }}"></a>
            <a href="https://api.whatsapp.com/send?phone=524433370550&text=Hola,%20me%20gustaría%20más%20información%20de%20veintidós,%20grupo%20inmobiliario." target="_blank"><img src="{{ asset('/img/ico/whats.png') }}"></a>

            <a href="/aviso_de_privacidad" target="_blank" class="enlace-footer">Aviso de privacidad</a>
            <a href="/terminos_y_condiciones" target="_blank" class="enlace-footer">Términos y condiciones</a>
        </div>
    </div>
    <div class="container-footer">
        <p>Copyright © 2020 Veintidós.</p>
        <a href="http://dragonware.com.mx" target="_blank" style="text-decoration:none;">
            <p>Desarrollado por DragonWare. &nbsp;<img src="{{ asset('/img/ico/dragonblanco.png') }}" width="22px" height="16px"></p>        
        </a>
    </div>
</footer>