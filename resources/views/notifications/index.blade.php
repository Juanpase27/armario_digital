@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Mis Notificaciones</h1>
        <a href="{{ route('notifications.create') }}"
            class="bg-blue-500 text-white font-semibold py-2 px-4 rounded shadow hover:bg-blue-600 transition mb-3 inline-block">Crear
            Notificación</a>

        @if ($notifications->isEmpty())
            <p class="text-gray-600">No tienes notificaciones.</p>
        @else
            <div class="overflow-x-auto mt-4">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4 border-b text-left">Mensaje</th>
                            <th class="py-2 px-4 border-b text-left">Estado</th>
                            <th class="py-2 px-4 border-b text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $notification)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b">{{ $notification->message }}</td>
                                <td class="py-2 px-4 border-b">{{ $notification->is_read ? 'Leída' : 'No leída' }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('notifications.edit', $notification) }}"
                                        class="bg-yellow-500 text-white font-semibold py-1 px-3 rounded hover:bg-yellow-600 transition">Editar</a>
                                    <form action="{{ route('notifications.destroy', $notification) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white font-semibold py-1 px-3 rounded hover:bg-red-600 transition">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
