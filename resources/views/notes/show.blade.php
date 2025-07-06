@extends('layout')

@section('title', 'Editar Nota')

@section('content')
    <h2>Editar Nota</h2>

    <form action="{{ route('notes.update', $note) }}" method="POST">
        @csrf @method('PUT')
        @include('notes.partials.form', ['note' => $note])
    </form>
@endsection
