<!-- resources/views/garments/index.blade.php -->
<h1>Hello</h1>

@section('content')
    <div class="container">
        <h1>Mis Prendas</h1>
        <a href="{{ route('garments.create') }}" class="btn btn-primary">Agregar Prenda</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Color</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($garments as $garment)
                    <tr>
                        <td>{{ $garment->name }}</td>
                        <td>{{ $garment->category }}</td>
                        <td>{{ $garment->color }}</td>
                        <td>
                            <a href="{{ route('garments.edit', $garment) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('garments.destroy', $garment) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
