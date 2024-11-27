{{-- resources/views/calendar_events/edit.blade.php --}}
@include('partials.nav')
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Evento</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('calendar-events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Método para indicar que es una actualización --}}

            <div class="form-group">
                <label for="event_name">Nombre del Evento</label>
                <input type="text" class="form-control" id="event_name" name="event_name"
                    value="{{ old('event_name', $event->event_name) }}" required>
            </div>

            <div class="form-group">
                <label for="event_date">Fecha del Evento</label>
                <input type="date" class="form-control" id="event_date" name="event_date"
                    value="{{ old('event_date', $event->event_date->format('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="outfit_id">Seleccionar Atuendo</label>
                <select class="form-control" id="outfit_id" name="outfit_id">
                    <option value="">Seleccione un atuendo (opcional)</option>
                    @foreach ($outfits as $outfit)
                        <option value="{{ $outfit->id }}" {{ $outfit->id == $event->outfit_id ? 'selected' : '' }}>
                            {{ $outfit->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Evento</button>
            <a href="{{ route('calendar-events.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
