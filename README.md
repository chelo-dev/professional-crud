# CRUD Profesional - Laravel 10

Este proyecto es un CRUD profesional desarrollado con **Laravel 10**, diseñado para gestionar notas de usuario. Utiliza un patrón limpio con separación de lógica de negocio en **servicios**, validación centralizada con **Form Requests**, y vistas responsivas usando **Bootstrap 5**.

## Características

- Modelo: `Note` (campos: `title`, `content`, `user_id`)
- Controlador: `NoteController` (resource)
- Validación: `NoteRequest`
- Servicio: `NoteService`
- Middleware: Autenticación
- Vistas: Bootstrap 5 (layout básico, formularios y tabla)

## Contenido reutilizable

```bash
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Notas')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>

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

<div class="mb-3">
    <label for="title" class="form-label">Título</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $note->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="content" class="form-label">Contenido</label>
    <textarea name="content" class="form-control" rows="5" required>{{ old('content', $note->content ?? '') }}</textarea>
</div>

<button class="btn btn-success">Guardar</button>
<a href="{{ route('notes.index') }}" class="btn btn-secondary">Cancelar</a>

app/
├── Http/
│   ├── Controllers/NoteController.php
│   ├── Requests/NoteRequest.php
├── Services/
│   └── NoteService.php
├── Models/
│   └── Note.php

resources/views/
├── layout.blade.php
└── notes/
    ├── index.blade.php
    ├── create.blade.php
    ├── edit.blade.php
    ├── show.blade.php
    └── partials/
        └── form.blade.php
