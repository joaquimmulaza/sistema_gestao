@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Documento</h2>
    
    <form action="{{ route('documentos.update', $documento->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Documento</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $documento->nome) }}" required>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="{{ old('tipo', $documento->tipo) }}" required>
        </div>

        <div class="mb-3">
            <label for="data_validade" class="form-label">Data de Validade</label>
            <input type="date" class="form-control" id="data_validade" name="data_validade" value="{{ old('data_validade', $documento->data_validade) }}" required>
        </div>

        <div class="form-group">
            <label>Documento (PDF, Imagem, etc.)</label>
            <input type="file" name="documento" class="form-control">
        </div>

        <div class="mb-3">
            <label for="instituicao_id" class="form-label">Instituição</label>
            <select class="form-control" name="instituicao_id" id="instituicao_id">
                @foreach($instituicoes as $instituicao)
                    <option value="{{ $instituicao->id }}" {{ $documento->instituicao_id == $instituicao->id ? 'selected' : '' }}>
                        {{ $instituicao->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="vistoria_id" class="form-label">Vistoria</label>
            <select class="form-control" name="vistoria_id" id="vistoria_id">
                @foreach($vistorias as $vistoria)
                    <option value="{{ $vistoria->id }}" {{ $documento->vistoria_id == $vistoria->id ? 'selected' : '' }}>
                        {{ $vistoria->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="relatorio_id" class="form-label">Relatório</label>
            <select class="form-control" name="relatorio_id" id="relatorio_id">
                @foreach($relatorios as $relatorio)
                    <option value="{{ $relatorio->id }}" {{ $documento->relatorio_id == $relatorio->id ? 'selected' : '' }}>
                        {{ $relatorio->titulo }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Documento</button>
        <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
