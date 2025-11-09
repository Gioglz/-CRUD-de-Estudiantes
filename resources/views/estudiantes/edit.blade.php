@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Editar Estudiante</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('estudiantes.update', $estudiante) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Nombre</label>
            <input type="text" name="nombre" class="w-full border px-4 py-2 rounded" value="{{ old('nombre', $estudiante->nombre) }}">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Correo</label>
            <input type="email" name="correo" class="w-full border px-4 py-2 rounded" value="{{ old('correo', $estudiante->correo) }}">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Carrera</label>
            <select name="carrera_id" class="w-full border px-4 py-2 rounded">
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera->id }}" {{ $estudiante->carrera_id == $carrera->id ? 'selected' : '' }}>
                        {{ $carrera->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Semestre</label>
            <input type="text" name="semestre" class="w-full border px-4 py-2 rounded" value="{{ old('semestre', $estudiante->semestre) }}">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
            Actualizar
        </button>
    </form>
@endsection