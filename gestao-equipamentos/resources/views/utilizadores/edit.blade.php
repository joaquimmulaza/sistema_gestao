@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Utilizador</h2>
    <form action="{{ route('utilizadores.update', $utilizador->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" value="{{ $utilizador->nome }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('utilizadores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
