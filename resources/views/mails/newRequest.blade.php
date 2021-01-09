<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alguien quiere agregar una propiedad a tu sitio</title>
</head>
<body>
    <p>Tienes una nueva propuesta de {{$data['nombre']}} para agregar una propiedad a tu sitio</p>
    <h3>Información de contacto:</h3>
       <p> Teléfono: {{$data['telefono']}} </p>
        <p>Correo: {{$data['correo']}}</p>
    <p>Revísala en tu plataforma de gestión <a href="{{route('solicitudes')}}">www.ventidos.com.mx/login</a> </p>
</body>
</html>