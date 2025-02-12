@extends('layouts.app')

@section('title', 'Nova Instituição')

@section('content')
<div class="container">
    <form action="{{ route('instituicoes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="activa">Ativa</label>
            <select name="activa" class="form-control" required>
                <option value="1">Ativa</option>
                <option value="0">Inativa</option>
            </select>
        </div>

        <div class="form-group">
            <label for="data_registo">Data de Registo</label>
            <input type="date" name="data_registo" class="form-control" required>
        </div>

        <!-- Campos 'created_at' e 'updated_at' não são necessários, pois o Laravel os gerencia automaticamente -->

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
