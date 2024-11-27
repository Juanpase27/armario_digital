@include('partials.nav')
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Eventos del Calendario</h1>
        <a href="{{ route('calendar-events.create') }}" class="btn btn-primary mb-3">Crear Evento</a>

        @if ($events->isEmpty())
            <p>No tienes eventos registrados.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Outfit Asociado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->event_name }}</td>
                            <td>{{ $event->event_date }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->outfit->name ?? 'Sin Outfit' }}</td>
                            <td>
                                <a href="{{ route('calendar-events.edit', $event) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('calendar-events.destroy', $event) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
