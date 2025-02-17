@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Relatório</h2>
    <form action="{{ route('relatorios.update', $relatorio->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" value="{{ $relatorio->titulo }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao" rows="4" required>{{ $relatorio->descricao }}</textarea>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" name="data" value="{{ $relatorio->data }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="{{ route('relatorios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
