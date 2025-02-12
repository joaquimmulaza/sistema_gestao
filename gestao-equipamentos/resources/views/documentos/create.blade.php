@extends('adminlte::page')

@section('title', 'Novo Documento')

@section('content_header')
    <h1>Cadastrar Documento</h1>
@endsection

@section('content')
    <form action="{{ route('documentos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tipo</label>
            <input type="text" name="tipo" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Data de Validade</label>
            <input type="date" name="data_validade" class="form-control" required>
        </div>
        <div class="form-group">
            <label>URL</label>
            <input type="url" name="url" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection
