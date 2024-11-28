@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Editar Categoría de Prenda</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('garment_categories.update', $garmentCategory->id) }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Nombre de la Categoría</label>
                <input type="text" class="form-input w-full border border-gray-300 rounded-lg p-2" id="name"
                    name="name" value="{{ old('name', $garmentCategory->name) }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Descripción</label>
                <textarea class="form-input w-full border border-gray-300 rounded-lg p-2" id="description" name="description"
                    rows="3">{{ old('description', $garmentCategory->description) }}</textarea>
            </div>

            <div class="flex justify-between">
                <button type="submit"
                    class="bg-blue-500 text-white font-semibold py-2 px-4 rounded shadow hover:bg-blue-600 transition">Actualizar
                    Categoría</button>
                <a href="{{ route('garment_categories.index') }}"
                    class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded hover:bg-gray-400 transition">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
