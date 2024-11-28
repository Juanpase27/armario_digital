@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Lista de Outfits</h1>
        <a href="{{ route('outfits.create') }}"
            class="bg-blue-500 text-white font-semibold py-2 px-4 rounded shadow hover:bg-blue-600 transition mb-4">Crear
            Nuevo Outfit</a>

        @if ($outfits->isEmpty())
            <p class="text-gray-600">No hay outfits registrados.</p>
        @else
            <div class="grid mt-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($outfits as $outfit)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ $outfit->image_path ?? asset('images/default-outfit.jpg') }}"
                            class="w-full h-48 object-cover" alt="Imagen del outfit">
                        <div class="p-4">
                            <h5 class="text-lg font-semibold mb-2">{{ $outfit->name }}</h5>
                            <p class="text-gray-700 mb-4">{{ $outfit->description ?? 'Sin descripción' }}</p>
                            <a href="{{ route('outfits.show', $outfit->id) }}"
                                class="bg-teal-500 text-white font-semibold py-2 px-4 rounded hover:bg-teal-600 transition">Ver
                                Detalles</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
