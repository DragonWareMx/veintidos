<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva propuesta de inmueble</title>
</head>
<body>
    <p>Tienes una nueva propuesta de {{$data['nombre']}} acerca de una de las propiedades de Veintidós.</p>
    <p>Mensaje: {{$data['comentario']}}
    <p>Revísala en tu plataforma de gestión <a href="{{route('mensajes')}}">www.ventidos.com.mx/login</a> </p>
</body>
</html>