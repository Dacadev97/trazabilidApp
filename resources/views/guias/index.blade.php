<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Guías de Transporte</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Guías de Transporte</h1>

        <ul class="list-group">
            @foreach($guias->groupBy('id_guia_transporte') as $idGuiaTransporte => $guiasGrupo)
            <li class="list-group-item 
                {{ $guiasGrupo->first()->estado_entrega == 'En proceso' ? 'bg-pastel-yellow' : 
                ($guiasGrupo->first()->estado_entrega == 'Entregado' ? 'bg-pastel-green' : 'bg-pastel-red') }}">
                <strong>ID Guía:</strong> {{ $idGuiaTransporte }} <br>
                <strong>Estado:</strong> {{ $guiasGrupo->first()->estado_entrega }} <br>
                <strong>Entregas asociadas:</strong> {{ $guiasGrupo->count() }}
            </li>
            @endforeach
        </ul>
        <a href="{{ route('entregas.index') }}" class="btn btn-primary mt-3" data-toggle="tooltip" data-placement="top" title="Volver a la Lista de Entregas">
            <i class="fas fa-arrow-left"></i>
      </a>
    </div>
</body>
</html>
