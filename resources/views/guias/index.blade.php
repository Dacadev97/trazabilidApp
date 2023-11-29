<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Guías de Transporte</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Guías de Transporte</h1>

        <ul class="list-group">
            @foreach($guias as $guia)
            <li class="list-group-item">
                <strong>ID Guía:</strong> {{ $guia->id_guia_transporte }} <br>
                <strong>Estado:</strong> {{ $guia->estado_entrega }} <br>
                <strong>Entregas asociadas:</strong> {{ $guias->where('id_guia_transporte', $guia->id_guia_transporte)->count() }}
            </li>
        @endforeach
        </ul>
        <a href="{{ route('entregas.index') }}" class="btn btn-primary mt-3">Volver a la Lista de Entregas</a>
    </div>
</body>
</html>
