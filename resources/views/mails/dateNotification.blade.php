<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DateNotification</title>
</head>

<body>
    <h2 style="font-size: 35px; color:#3788D8;">Notificación de cita agendada</h2>
    <h3 style="font-size: 30px; color:#3788D8;">Agenda</h3>
    <p style="font-size: 25px; color:#2C3E50;">Inmobiliaria montana le notifica que ha sido agendado a las {{ $hour }} el dia {{ $date }} <br>
    Por el asesor {{ $adviser_name }}, para visitar el inmueble con dirección {{$property_address}}.</p>

</body>

</html>
