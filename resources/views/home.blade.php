@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Lista de Estudiantes</h1>
    <a href="{{ route('estudiantes.create') }}" class="bg-blue-500 text-white px-4 py-2 mb-4 inline-block">Nuevo Estudiante</a>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full bg-white shadow-md">
        <thead>
            <tr>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Correo</th>
                <th class="px-4 py-2">Carrera</th>
                <th class="px-4 py-2">Semestre</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
                <tr>
                    <td class="border px-4 py-2">{{ $estudiante->nombre }}</td>
                    <td class="border px-4 py-2">{{ $estudiante->correo }}</td>
                    <td class="border px-4 py-2">{{ $estudiante->carrera->nombre }}</td>
                    <td class="border px-4 py-2">{{ $estudiante->semestre }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('estudiantes.edit', $estudiante) }}" class="text-blue-500">Editar</a>
                        <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
</html>