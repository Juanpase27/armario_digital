@include('partials.nav')
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Eventos del Calendario</h1>
        <a href="{{ route('calendar-events.create') }}"
            class="bg-blue-500 text-white font-semibold py-2 px-4 rounded shadow hover:bg-blue-600 transition">Crear
            Evento</a>

        @if ($events->isEmpty())
            <p class="mt-4 text-gray-600">No tienes eventos registrados.</p>
        @else
            <div class="overflow-x-auto mt-4">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Nombre</th>
                            <th class="py-3 px-6 text-left">Fecha</th>
                            <th class="py-3 px-6 text-left">Descripción</th>
                            <th class="py-3 px-6 text-left">Outfit Asociado</th>
                            <th class="py-3 px-6 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($events as $event)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6">{{ $event->event_name }}</td>
                                <td class="py-3 px-6">{{ $event->event_date }}</td>
                                <td class="py-3 px-6">{{ $event->description }}</td>
                                <td class="py-3 px-6">{{ $event->outfit->name ?? 'Sin Outfit' }}</td>
                                <td class="py-3 px-6 flex space-x-2">
                                    <a href="{{ route('calendar-events.edit', $event) }}"
                                        class="bg-yellow-500 text-white font-semibold py-1 px-3 rounded shadow hover:bg-yellow-600 transition">Editar</a>
                                    <form action="{{ route('calendar-events.destroy', $event) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white font-semibold py-1 px-3 rounded shadow hover:bg-red-600 transition">Eliminar</button>
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
