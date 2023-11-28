<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Entregas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card p-4">
        <h1 class="mb-4" style="background-color: #f8f9fa; padding: 10px;">Lista de Entregas</h1>

        <a href="{{ route('entregas.create') }}" class="btn btn-success mb-3">Registrar Entrega</a>

        <div class="row">
            @foreach($entregas as $entrega)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">ID Entrega: {{ $entrega->id_entrega }}</h5>
                            <p class="card-text">
                                <strong>ID Pedido:</strong> {{ $entrega->id_pedido }} <br>
                                <strong>Fecha de Entrega:</strong> {{ $entrega->fecha_entrega }} <br>
                                <strong>Estado de Entrega:</strong> {{ $entrega->estado_entrega }} <br>
                            </p>
                            <a href="{{ route('entregas.show', $entrega->id_entrega) }}" class="btn btn-primary">Ver Detalles</a>
                            @if($entrega->guiaTransporte)
                                <a href="{{ route('guias.show', $entrega->guiaTransporte->id) }}" class="btn btn-secondary mt-2">Ver Guía</a>
                            @else
                                <p class="mt-2">Sin guía de transporte asociada</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
