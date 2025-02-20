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
            <td>{{ $documento->data_validade ? $documento->data_validade->format('d/m/Y') : 'Não informado' }}</td>
        </tr>
        <tr>
            <th>URL do Documento:</th>
            <td>
                @if($documento->url)
                    <a href="{{ $documento->url }}" target="_blank" class="btn btn-primary">Visualizar Documento</a>
                    <a href="{{ $documento->url }}" download class="btn btn-success">Baixar</a>
                @else
                    <span class="text-warning">Nenhum documento anexado</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>Instituição:</th>
            <td>{{ optional($documento->instituicao)->nome ?? 'Não vinculado' }}</td>
        </tr>
        <tr>
            <th>Vistoria:</th>
            <td>
                @if($documento->vistoria)
                    <a href="{{ route('vistorias.show', $documento->vistoria->id) }}">
                        {{ $documento->vistoria->id }}
                    </a>
                @else
                    <span class="text-muted">Sem vistoria</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>Relatório:</th>
            <td>
                @if($documento->relatorio)
                    <a href="{{ route('relatorios.show', $documento->relatorio->id) }}">
                        {{ $documento->relatorio->titulo }}
                    </a>
                @else
                    <span class="text-muted">Sem relatório</span>
                @endif
            </td>
        </tr>
    </table>

    <div class="d-flex">
        <a href="{{ route('documentos.index') }}" class="btn btn-secondary me-2">Voltar</a>

        @can('editar-documento', $documento)
            <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-warning me-2">Editar</a>
        @endcan

        @can('excluir-documento', $documento)
            <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        @endcan
    </div>
</div>
@endsection
