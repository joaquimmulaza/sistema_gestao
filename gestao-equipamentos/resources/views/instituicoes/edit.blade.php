@extends('layouts.app')

@section('title', 'Editar Instituição')

@section('content')
<div class="container">
    <form action="{{ route('instituicoes.update', $instituicao->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $instituicao->nome }}" required>
        </div>
        <div class="form-group">
            <label for="municipio">Município</label>
            <input type="text" name="municipio" class="form-control" value="{{ $instituicao->endereco->municipio ?? 'N/A'}}" required>
        </div>
        
        <div class="form-group">
            <label for="comuna">Comuna</label>
            <input type="text" name="comuna" class="form-control" value="{{ $instituicao->endereco->comuna ?? 'N/A'}}">
        </div>
        
        <div class="form-group">
            <label for="distrito">Distrito</label>
            <input type="text" name="distrito" class="form-control" value="{{ $instituicao->endereco->distrito ?? 'N/A'}}">
        </div>
        <div class="form-group">
            <label for="activa">Ativa</label>
            <select name="activa" class="form-control" required>
                <option value="1" {{ $instituicao->activa == 1 ? 'selected' : '' }}>Ativa</option>
                <option value="0" {{ $instituicao->activa == 0 ? 'selected' : '' }}>Inativa</option>
            </select>
        </div>
    
        <div class="form-group">
            <label for="data_registo">Data de Registo</label>
            <input type="date" name="data_registo" class="form-control" value="{{ $instituicao->data_registo }}" required>
        </div>
    
        <button class="btn btn-primary">Atualizar</button>
    </form>
    
</div>
@endsection