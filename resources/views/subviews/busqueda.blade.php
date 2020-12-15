<form action="/propiedades" class="barra-busqueda" method="get">
    <div class="search-50 left">
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
        <button type="button" onclick="modal('sale')" class="type-search options-search">Venta</button>
        <button type="button" onclick="modal('rent')" class="type-search options-search">Renta</button>
        <input id="deal" type="hidden"  name="deal" value="">
    </div>
    <div class="search-50 right">
        <input type="text" name="busqueda" id="busqueda" class="cuadro-busqueda options-search">
        <input type="image" src="{{ asset('/img/ico/buscar.png') }}" alt="Submit Form" class="search-button" />
    </div>
</form>
<script>
    function modal(type){
        deal=document.getElementById('deal');
        deal.value=type;
    }
</script>