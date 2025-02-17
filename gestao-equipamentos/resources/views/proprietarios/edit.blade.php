@extends('layouts.app')

@section('title', 'Editar Proprietário')

@section('content')
<div class="container">
    <form action="{{ route('proprietarios.update', $proprietario) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $proprietario->nome }}" required>
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control" value="{{ $proprietario->telefone }}">
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
        @if ($errors->has('instituicao_id'))
    <div class="alert alert-danger">
        {{ $errors->first('instituicao_id') }}
    </div>
@endif

        
        <div class="form-group">
            <label>Nº Bilhete</label>
            <input type="text" name="n_bilhete" class="form-control" value="{{ $proprietario->n_bilhete }}" required>
        </div>
        <div class="form-group">
            <label>Validade do Bilhete</label>
            <input type="date" name="validade_bilhete" class="form-control" value="{{ $proprietario->validade_bilhete }}" required>
        </div>
        <button class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
