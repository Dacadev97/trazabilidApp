<!DOCTYPE html>
<html lang="es">
<head>
      <meta charset="UTF-8">
      <title>Detalles de Entrega</title>
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
      <h1 class="mb-4">Detalles de Entrega</h1>

      <div class="card">
            <div class="card-body">
                  <p><strong>ID Entrega:</strong> {{ $entrega->id_entrega }}</p>
                  <p><strong>ID Pedido:</strong> {{ $entrega->id_pedido }}</p>
                  <p><strong>Fecha de Despacho:</strong> {{ $entrega->fecha_despacho }}</p>
                  <p><strong>Fecha de Entrega:</strong> {{ $entrega->fecha_entrega }}</p>
                  <p><strong>Estado de Entrega:</strong> {{ $entrega->estado_entrega }}</p>
                  <!-- Agrega más detalles según tus necesidades -->

                  <strong>Foto de Guía:</strong>
                  @if($entrega->foto_guia)
                        <img src="{{ asset('storage/' . $entrega->foto_guia) }}" alt="Foto de Guía" class="img-fluid mt-3">
                  @else
                        <p>Sin foto de guía</p>
                  @endif

                  <strong>Observaciones de Entrega:</strong>
                  <p>{{ $entrega->observaciones_entrega ?? 'Sin observaciones' }}</p>

                  <a href="{{ route('entregas.index') }}" class="btn btn-primary mt-3">Volver a la Lista de Entregas</a>
            </div>
      </div>
</div>
</body>
</html>