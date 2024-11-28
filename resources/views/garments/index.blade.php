@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Mis Prendas</h1>
        <a href="{{ route('garments.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 mb-4 inline-block">Agregar Prenda</a>

        @if ($garments->isEmpty())
            <p class="text-gray-700">No tienes prendas registradas. ¡Empieza agregando algunas!</p>
        @else
            <div class="overflow-x-auto mt-4">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Nombre</th>
                            <th class="py-3 px-6 text-left">Categoría</th>
                            <th class="py-3 px-6 text-left">Color</th>
                            <th class="py-3 px-6 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($garments as $garment)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6">{{ $garment->name }}</td>
                                <td class="py-3 px-6">{{ $garment->category->name ?? 'Sin categoría' }}</td>
                                <td class="py-3 px-6">{{ $garment->color ?? 'No especificado' }}</td>
                                <td class="py-3 px-6">
                                    <a href="{{ route('garments.edit', $garment) }}"
                                        class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500">Editar</a>
                                    <form action="{{ route('garments.destroy', $garment) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar esta prenda?')">Eliminar</button>
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
