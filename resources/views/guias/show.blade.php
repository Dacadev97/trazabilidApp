<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de la Guía</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Detalles de la Guía</h2>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($guia->entregas as $entrega)
                        <li class="list-group-item">
                            <strong>ID Guía:</strong> {{  $entrega->id_guia_transporte }}
                            <br>
                            <strong>ID Entrega:</strong> {{ $entrega->id_entrega }}
                            <br>
                            <strong>Fecha de Entrega:</strong> {{ $entrega->fecha_entrega }}
                            <br>
                            <strong>Estado:</strong> {{ $entrega->estado_entrega }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('entregas.index') }}" class="btn btn-primary">Volver a la lista de entregas</a>
        </div>
    </div>
</body>
</html>