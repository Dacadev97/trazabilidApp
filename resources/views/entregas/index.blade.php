<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Entregas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="card p-4">
        <h1 class="mb-4">Lista de Entregas</h1>

        <div class="row">
            @foreach($entregas as $entrega)
                <div class="col-md-4.5">
                    <div class="card mb-5 {{ $entrega->estado_entrega == 'En proceso' ? 'bg-pastel-yellow' : ($entrega->estado_entrega == 'Entregado' ? 'bg-pastel-green' : 'bg-pastel-red') }}">
                        <div class="card-body">
                            <h5 class="card-title">ID Entrega: {{ $entrega->id_entrega }}</h5>
                            <p class="card-text">
                                <strong>ID Pedido:</strong> {{ $entrega->id_pedido }} <br>
                                <strong>Fecha de Creación:</strong> {{ $entrega->fecha_entrega }} <br>
                                <strong>Estado de Entrega:</strong> {{ $entrega->estado_entrega }} <br>
                            </p>
                            <a href="{{ route('entregas.edit', $entrega->id_entrega) }}" class="btn btn-warning" style="display:inline-block;">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('entregas.destroy', $entrega->id_entrega) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>

                            <a href="{{ route('entregas.show', $entrega->id_entrega) }}" class="btn btn-primary" style="display:inline-block;">
                                <i class="fas fa-eye"></i>
                            </a>

                            @if($entrega->id_guia_transporte)
                                <a href="{{ route('guias.show', $entrega->id_guia_transporte) }}" class="btn btn-secondary" style="display:inline-block;">
                                    <i class="fas fa-map"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('entregas.create') }}" class="btn btn-success" title="Registrar Entrega">
                    <i class="fas fa-plus"></i>
                </a>
                <a href="{{ route('guias.index') }}" class="btn btn-info" title="Listado de Guías">
                    <i class="fas fa-list"></i>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
