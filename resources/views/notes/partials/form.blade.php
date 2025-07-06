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
