@include('partials.nav')
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mis Notificaciones</h1>
        <a href="{{ route('notifications.create') }}" class="btn btn-primary mb-3">Crear Notificación</a>

        @if ($notifications->isEmpty())
            <p>No tienes notificaciones.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Mensaje</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifications as $notification)
                        <tr>
                            <td>{{ $notification->message }}</td>
                            <td>{{ $notification->is_read ? 'Leída' : 'No leída' }}</td>
                            <td>
                                <a href="{{ route('notifications.edit', $notification) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('notifications.destroy', $notification) }}" method="POST"
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
