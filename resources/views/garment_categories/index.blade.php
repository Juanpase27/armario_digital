@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Categorías de Prendas</h1>

        <!-- Mensajes de éxito -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Botón para agregar nueva categoría -->
        <a href="{{ route('garment_categories.create') }}"
            class="bg-blue-500 text-white font-semibold py-2 px-4 rounded shadow hover:bg-blue-600 transition mb-4">Agregar
            Categoría</a>

        <!-- Tabla de categorías -->
        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-2 px-4 border-b">Nombre</th>
                        <th class="py-2 px-4 border-b">Descripción</th>
                        <th class="py-2 px-4 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b">{{ $category->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $category->description ?? 'Sin descripción' }}</td>
                            <td class="py-2 px-4 border-b">
                                <!-- Botón para editar -->
                                <a href="{{ route('garment_categories.edit', $category) }}"
                                    class="bg-yellow-500 text-white font-semibold py-1 px-3 rounded hover:bg-yellow-600 transition">Editar</a>

                                <!-- Botón para eliminar -->
                                <form action="{{ route('garment_categories.destroy', $category) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white font-semibold py-1 px-3 rounded hover:bg-red-600 transition"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-gray-600">No hay categorías disponibles.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
