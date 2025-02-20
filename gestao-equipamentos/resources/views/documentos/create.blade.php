@extends('layouts.app')

@section('title', 'Novo Documento')

@section('content')
<h1>Cadastrar Documento</h1>
    <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
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
            <label>Documento (PDF, Imagem, etc.)</label>
            <input type="file" name="documento" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="instituicao_id" class="form-label">Instituição</label>
            <select class="form-control" name="instituicao_id" id="instituicao_id">
                @foreach($instituicoes as $instituicao)
                    <option value="{{ $instituicao->id }}">
                        {{ $instituicao->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="vistoria_id" class="form-label">Vistoria</label>
            <select class="form-control" name="vistoria_id" id="vistoria_id">
                @foreach($vistorias as $vistoria)
                    <option value="{{ $vistoria->id }}">
                        {{ $vistoria->id }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="relatorio_id" class="form-label">Relatório</label>
            <select class="form-control" name="relatorio_id" id="relatorio_id">
                @foreach($relatorios as $relatorio)
                    <option value="{{ $relatorio->id }}">
                        {{ $relatorio->titulo }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection
