@extends('layout')

@section('title', 'Notas')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Notas</h2>
        <a href="{{ route('notes.create') }}" class="btn btn-primary">Nueva Nota</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Contenido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
                <tr>
                    <td>{{ $note->title }}</td>
                    <td>{{ Str::limit($note->content, 50) }}</td>
                    <td>
                        <a href="{{ route('notes.show', $note) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('notes.edit', $note) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('notes.destroy', $note) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('¿Eliminar esta nota?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $notes->links() }}
@endsection
