@extends('layout')

@section('title', 'Crear Nota')

@section('content')
    <h2>Crear Nota</h2>

    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        @include('notes.partials.form', ['note' => null])
    </form>
@endsection
