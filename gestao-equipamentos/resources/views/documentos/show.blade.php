@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalhes do Documento</h2>
    
    <table class="table">
        <tr>
            <th>ID:</th>
            <td>{{ $documento->id }}</td>
        </tr>
        <tr>
            <th>Nome:</th>
            <td>{{ $documento->nome }}</td>
        </tr>
        <tr>
            <th>Tipo:</th>
            <td>{{ $documento->tipo }}</td>
        </tr>
        <tr>
            <th>Data de Validade:</th>
            <td>{{ $documento->data_validade }}</td>
        </tr>
        <tr>
            <th>URL do Documento:</th>
            <td><a href="{{ $documento->url }}" target="_blank">{{ $documento->url }}</a></td>
        </tr>
        <tr>
            <th>Instituição:</th>
            <td>{{ optional($documento->instituicao)->nome }}</td>
        </tr>
        <tr>
            <th>Vistoria:</th>
            <td>{{ optional($documento->vistoria)->id }}</td>
        </tr>
        <tr>
            <th>Relatório:</th>
            <td>{{ optional($documento->relatorio)->titulo }}</td>
        </tr>
    </table>

    <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-warning">Editar</a>

    <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
    </form>
</div>
@endsection
