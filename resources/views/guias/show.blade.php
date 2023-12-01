<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles de la Guía</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Detalles de la Guía</h1>
            </div>
            <div class="card-body">
                <ul class="list-group">
                   
                        <li class="list-group-item">
                            <strong>ID Guía:</strong> {{ $guia->id_guia_transporte }}
                            <br>
                            <strong>Fecha de Creación:</strong> {{ $guia->created_at }}
                            <br>
                            <strong>Fecha de Actualización:</strong> {{ $guia->updated_at }}
                            <br>
                            <strong>Estado:</strong> {{ $guia->estado_entrega }}
                        </li>

                </ul>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('entregas.index') }}" class="btn btn-primary mt-3" data-toggle="tooltip" data-placement="top" title="Volver a la Lista de Entregas">
                <i class="fas fa-arrow-left"></i>
          </a>
        </div>
    </div>
</body>
</html>