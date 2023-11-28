<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nueva Entrega</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card p-4">
        <h1 class="mb-4">Crear Nueva Entrega</h1>

        <form action="{{ route('entregas.store') }}" method="post">

            @csrf

            <div class="form-group">
                <label for="id_pedido">ID Pedido:</label>
                <input type="text" name="id_pedido" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="id_cliente">ID Cliente:</label>
                <input type="text" name="id_cliente" class="form-control" required>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fecha_despacho">Fecha de Despacho:</label>
                    <input type="date" name="fecha_despacho" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="fecha_entrega">Fecha de Entrega:</label>
                    <input type="date" name="fecha_entrega" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label for="id_guia_transporte">ID Guía de Transporte:</label>
                <input type="text" name="id_guia_transporte" class="form-control">
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
                <textarea name="observaciones" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="foto_guia">Foto Guía:</label>
                <input type="file" name="foto_guia" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Crear Entrega</button>

            <a href="{{ route('entregas.index') }}" class="btn btn-primary">Regresar a lista de entregas</a>

        </form>
    </div>
</div>
</body>
</html>
