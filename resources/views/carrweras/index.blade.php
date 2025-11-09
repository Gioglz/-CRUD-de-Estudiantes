@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Lista de Carreras</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('carreras.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mb-4 inline-block">
        + Nueva Carrera
    </a>

    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="py-2 px-4">Nombre</th>
                <th class="py-2 px-4">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carreras as $carrera)
                <tr class="border-b">
                    <td class="py-2 px-4">{{ $carrera->nombre }}</td>
                    <td class="py-2 px-4 flex gap-2">
                        <a href="{{ route('carreras.edit', $carrera) }}" class="text-blue-500 hover:underline">Editar</a>
                        <form action="{{ route('carreras.destroy', $carrera) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
       