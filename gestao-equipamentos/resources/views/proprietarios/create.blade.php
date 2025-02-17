@extends('layouts.app')

@section('title', 'Novo Proprietário')

@section('content')
<div class="container">
    <form action="{{ route('proprietarios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control">
        </div>
        <div class="form-group">
            <label for="instituicao_id">Instituição</label>
            <select name="instituicao_id" class="form-control">
                <option value="">Nenhuma</option>
                @foreach ($instituicoes as $instituicao)
                    <option value="{{ $instituicao->id }}" 
                        {{ isset($proprietario) && $proprietario->instituicao_id == $instituicao->id ? 'selected' : '' }}>
                        {{ $instituicao->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label>Nº Bilhete</label>
            <input type="text" name="n_bilhete" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Validade do Bilhete</label>
            <input type="date" name="validade_bilhete" class="form-control" required>
        </div>
        <button class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
