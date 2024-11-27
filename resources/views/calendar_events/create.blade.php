@include('partials.nav')
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Evento</h1>
        <form action="{{ route('calendar-events.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="event_name" class="form-label">Nombre del Evento</label>
                <input type="text" name="event_name" id="event_name" class="form-control" value="{{ old('event_name') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="event_date" class="form-label">Fecha del Evento</label>
                <input type="date" name="event_date" id="event_date" class="form-control" value="{{ old('event_date') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="outfit_id" class="form-label">Outfit Asociado</label>
                <select name="outfit_id" id="outfit_id" class="form-control">
                    <option value="">Ninguno</option>
                    @foreach ($outfits as $outfit)
                        <option value="{{ $outfit->id }}">{{ $outfit->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Crear Evento</button>
        </form>
    </div>
@endsection
