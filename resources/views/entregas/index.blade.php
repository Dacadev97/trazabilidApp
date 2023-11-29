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
        <h1 class="mb-4">Lista de Entregas</h1>

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
                            @if($entrega->id_guia_transporte)
                                <a href="{{ route('guias.show', $entrega->id_guia_transporte) }}" class="btn btn-secondary">Ver Guía</a>
                            @else
                                <p>No hay guía de transporte asociada a esta entrega.</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('entregas.create') }}" class="btn btn-success ">Registrar Entrega</a>
                <a href="{{ route('guias.index') }}" class="btn btn-info">Listado de Guías</a> 
            </div>
        </div>
    </div>
</div>
</body>
</html>
