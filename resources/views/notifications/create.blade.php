@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Crear Notificación</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('notifications.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-semibold mb-2">Mensaje</label>
                <textarea
                    class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="message" name="message" rows="3" required></textarea>
            </div>

            <div class="flex justify-between">
                <button type="submit"
                    class="bg-blue-500 text-white font-semibold py-2 px-4 rounded shadow hover:bg-blue-600 transition">Crear
                    Notificación</button>
                <a href="{{ route('notifications.index') }}"
                    class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded hover:bg-gray-400 transition">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
