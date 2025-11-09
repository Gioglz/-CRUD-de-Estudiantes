@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Editar Carrera</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('carreras.update', $carrera) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Nombre de la carrera</label>
            <input type="text" name="nombre" class="w-full border px-4 py-2 rounded" value="{{ old('nombre', $carrera->nombre) }}">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
            Actualizar
        </button>
    </form>
@endsection