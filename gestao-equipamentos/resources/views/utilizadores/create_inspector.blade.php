<!-- create_inspector.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Registrar Inspetor</h2>
    <form action="{{ route('inspetores.registrar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
@endsection