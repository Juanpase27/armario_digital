@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Crear Evento</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('calendar-events.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label for="event_name" class="block text-gray-700 font-semibold mb-2">Nombre del Evento</label>
                <input type="text" class="form-input w-full border border-gray-300 rounded-lg p-2" id="event_name"
                    name="event_name" required>
            </div>

            <div class="mb-4">
                <label for="event_date" class="block text-gray-700 font-semibold mb-2">Fecha del Evento</label>
                <input type="date" class="form-input w-full border border-gray-300 rounded-lg p-2" id="event_date"
                    name="event_date" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Descripción</label>
                <textarea class="form-input w-full border border-gray-300 rounded-lg p-2" id="description" name="description"
                    rows="3"></textarea>
            </div>

            <div class="mb-4">
                <label for="outfit_id" class="block text-gray-700 font-semibold mb-2">Seleccionar Atuendo</label>
                <select class="form-input w-full border border-gray-300 rounded-lg p-2" id="outfit_id" name="outfit_id">
                    <option value="">Seleccione un atuendo (opcional)</option>
                    @foreach ($outfits as $outfit)
                        <option value="{{ $outfit->id }}">{{ $outfit->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-between">
                <button type="submit"
                    class="bg-blue-500 text-white font-semibold py-2 px-4 rounded shadow hover:bg-blue-600 transition">Crear
                    Evento</button>
                <a href="{{ route('calendar-events.index') }}"
                    class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded hover:bg-gray-400 transition">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
