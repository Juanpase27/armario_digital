@include('partials.nav')
@extends('layouts.app') <!-- Extiende de un layout base -->

@section('content')
    <div class="container">
        <h1>Lista de Outfits</h1>
        <a href="{{ route('outfits.create') }}" class="btn btn-primary mb-3">Crear Nuevo Outfit</a>

        @if ($outfits->isEmpty())
            <p>No hay outfits registrados.</p>
        @else
            <div class="row">
                @foreach ($outfits as $outfit)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img src="{{ $outfit->image_path ?? asset('images/default-outfit.jpg') }}" class="card-img-top"
                                alt="Imagen del outfit">
                            <div class="card-body">
                                <h5 class="card-title">{{ $outfit->name }}</h5>
                                <p class="card-text">{{ $outfit->description ?? 'Sin descripción' }}</p>
                                <a href="{{ route('outfits.show', $outfit->id) }}" class="btn btn-info">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
