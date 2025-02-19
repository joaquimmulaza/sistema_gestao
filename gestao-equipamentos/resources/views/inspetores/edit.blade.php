<!-- create_inspector.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar Inspetor</h2>
    <form action="{{ route('inspetores.update' , $inspetor->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required value="{{ $inspetor->nome }}">
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection