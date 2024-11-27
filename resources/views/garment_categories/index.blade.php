@include('partials.nav')
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Categorías de Prendas</h1>

        <!-- Mensajes de éxito -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Botón para agregar nueva categoría -->
        <a href="{{ route('garment_categories.create') }}" class="btn btn-primary mb-3">Agregar Categoría</a>

        <!-- Tabla de categorías -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description ?? 'Sin descripción' }}</td>
                        <td>
                            <!-- Botón para editar -->
                            <a href="{{ route('garment_categories.edit', $category) }}"
                                class="btn btn-warning btn-sm">Editar</a>

                            <!-- Botón para eliminar -->
                            <form action="{{ route('garment_categories.destroy', $category) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No hay categorías disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
