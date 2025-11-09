@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Lista de Estudiantes</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('estudiantes.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mb-4 inline-block">
        + Nuevo Estudiante
    </a>

    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="py-2 px-4">Nombre</th>
                <th class="py-2 px-4">Correo</th>
                <th class="py-2 px-4">Carrera</th>
                <th class="py-2 px-4">Semestre</th>
                <th class="py-2 px-4">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
                <tr class="border-b">
                    <td class="py-2 px-4">{{ $estudiante->nombre }}</td>
                    <td class="py-2 px-4">{{ $estudiante->correo }}</td>
                    <td class="py-2 px-4">{{ $estudiante->carrera->nombre }}</td>
                    <td class="py-2 px-4">{{ $estudiante->semestre }}</td>
                    <td class="py-2 px-4 flex gap-2">
                        <a href="{{ route('estudiantes.edit', $estudiante) }}" class="text-blue-500 hover:underline">Editar</a>
                        <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach