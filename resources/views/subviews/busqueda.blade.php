<form action="" class="barra-busqueda" action="">
    @csrf
    <div class="search-50 left">
        <select name="tipo" id="" class="options-search">
            <option value="" selected disabled>Tipo</option>
        </select>
        <select name="precio" id="" class="options-search">
            <option value="" selected disabled>Precio</option>
        </select>
        <button type="button" class="type-search options-search">Venta</button>
        <button type="button" class="type-search options-search">Renta</button>
    </div>
    <div class="search-50 right">
        <input type="text" name="busqueda" id="busqueda" class="cuadro-busqueda options-search">
        <input type="image" src="{{ asset('/img/ico/buscar.png') }}" alt="Submit Form" class="search-button" />
    </div>
</form>