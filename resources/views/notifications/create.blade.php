@include('partials.nav')
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Notificación</h1>
        <form action="{{ route('notifications.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="message" class="form-label">Mensaje</label>
                <input type="text" name="message" id="message" class="form-control" value="{{ old('message') }}" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="is_read" id="is_read" class="form-check-input" value="1">
                <label for="is_read" class="form-check-label">Marcar como leída</label>
            </div>

            <button type="submit" class="btn btn-success">Crear</button>
        </form>
    </div>
@endsection
