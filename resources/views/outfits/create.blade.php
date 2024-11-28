@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-4 p-6">
        <h1 class="text-3xl font-bold mb-6">Crear Outfit</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('outfits.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Nombre del Outfit</label>
                <input type="text"
                    class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="name" name="name" required>
            </div>

            <div class="mb-4">
                <label for="image_path" class="block text-gray-700 font-semibold mb-2">Imagen del Outfit</label>
                <input type="file"
                    class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="image_path" name="image_path" accept="image/*">
            </div>

            <div class="mb-4">
                <label for="garments" class="block text-gray-700 font-semibold mb-2">Seleccionar Prendas</label>
                <select name="garments[]" id="garments"
                    class="form-select w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    multiple>
                    @foreach ($garments as $garment)
                        <option value="{{ $garment->id }}">{{ $garment->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-between">
                <button type="submit"
                    class="bg-blue-500 text-white font-semibold py-2 px-4 rounded shadow hover:bg-blue-600 transition">Crear
                    Outfit</button>
                <a href="{{ route('outfits.index') }}"
                    class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded hover:bg-gray-400 transition">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
