<h1>Lista de Guías de Transporte</h1>

<ul>
    @foreach($guias as $guia)
        <li>
            <strong>ID Guía:</strong> {{ $guia->id }} <br>
            <strong>Estado:</strong> {{ $guia->estado }} <br>
            <strong>Entregas asociadas:</strong>
            @if($guia->entregas->count() > 0)
                <ul>
                    @foreach($guia->entregas as $entrega)
                        <li>{{ $entrega->id_entrega }}</li>
                    @endforeach
                </ul>
            @else
                <p>No hay entregas asociadas a esta guía.</p>
            @endif
        </li>
    @endforeach
</ul>

<a href="{{ route('guias.create') }}">Registrar Guía de Transporte</a>
