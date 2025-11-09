@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Registrar Estudiante</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('estudiantes.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-1">Nombre</label>
            <input type="text" name="nombre" class="w-full border px-4 py-2 rounded" value="{{ old('nombre') }}">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Correo</label>
            <input type="email" name="correo" class="w-full border px-4 py-2 rounded" value="{{ old('correo') }}">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Carrera</label>
            <select name="carrera_id" class="w-full border px-4 py-2 rounded">
                <option value="">-- Selecciona una carrera --</option>
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Semestre</label>
            <input type="text" name="semestre" class="w-full border px-4 py-2 rounded" value="{{ old('semestre') }}">
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
            Guardar
        </button>
    </form>
@endsection