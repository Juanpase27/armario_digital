@extends('layouts.app') <!-- Cambia 'app' si usas otro layout -->

@section('content')
<div class="container">
    <h1>Lista de Outfits</h1>

    @if ($outfits->isEmpty())
        <p>No hay outfits disponibles.</p>
    @else
        <div class="row">
            @foreach ($outfits as $outfit)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <!-- Imagen del outfit -->
                        @if ($outfit->image_path)
                            <img src="{{ asset('storage/' . $outfit->image_path) }}" class="card-img-top" alt="{{ $outfit->name }}">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $outfit->name }}</h5>
                            <p class="card-text">
                                <strong>Prendas:</strong>
                                <ul>
                                    @foreach ($outfit->garments as $garment)
                                        <li>{{ $garment->name }} ({{ $garment->category }})</li>
                                    @endforeach
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
