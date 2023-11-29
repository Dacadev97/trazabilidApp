<!DOCTYPE html>
<html lang="es">
<head>
      <meta charset="UTF-8">
      <title>Editar Entrega</title>
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
      <div class="container mt-5">
    <div class="card p-4">
        <h1 class="mb-4">Editar Entrega</h1>
            <form action="{{ route('entregas.update', ['id' => $entrega->id_entrega]) }}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="form-group">
                        <label for="id_pedido">ID Pedido:</label>
                        <input type="text" id="id_pedido" name="id_pedido" class="form-control" value="{{ $entrega->id_pedido }}" required>
                  </div>

                  <div class="form-group">
                        <label for="id_cliente">ID Cliente:</label>
                        <input type="number" id="id_cliente" name="id_cliente" class="form-control" value="{{ $entrega->id_cliente }}" required>
                  </div>

                  <div class="form-group">
                        <label for="fecha_despacho">Fecha Despacho:</label>
                        <input type="date" id="fecha_despacho" name="fecha_despacho" class="form-control" value="{{ $entrega->fecha_despacho }}" required>
                  </div>

                  <div class="form-group">
                        <label for="fecha_entrega">Fecha Entrega:</label>
                        <input type="date" id="fecha_entrega" name="fecha_entrega" class="form-control" value="{{ $entrega->fecha_entrega }}" required>
                  </div>

                  <div class="form-group">
                        <label for="id_guia_transporte">ID Guía Transporte:</label>
                        <input type="number" id="id_guia_transporte" name="id_guia_transporte" class="form-control" value="{{ $entrega->id_guia_transporte }}" required>
                  </div>

                  <div class="form-group">
                        <label for="estado_entrega">Estado de Entrega:</label>
                        <select name="estado_entrega" class="form-control" required>
                            <option value="">Selecciona un estado</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Entregado">Entregado</option>
                            <option value="Devolución">Devolución</option>
                        </select>
                    </div>

                  <div class="form-group">
                        <label for="observaciones">Observaciones:</label>
                        <textarea id="observaciones" name="observaciones" class="form-control">{{ $entrega->observaciones }}</textarea>
                  </div>

                  <a href="{{ route('entregas.index') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Volver a la Lista de Entregas">
                        <i class="fas fa-arrow-left"></i>
                  </a>
        
                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Guardar">
                        <i class="fas fa-save"></i>
                    </button>
            </form>

            
      </div>
</body>
</html>