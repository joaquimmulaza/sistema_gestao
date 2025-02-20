@extends('layouts.app')

@section('content')
<h2>Documentos</h2>
    <a href="{{ route('documentos.create') }}" class="btn btn-success mb-3">Novo Documento</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Data de Validade</th>
                <th>Instituição</th>
                <th>Vistoria</th>
                <th>Relatorio</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documentos as $doc)
                <tr>
                    <td>{{ $doc->id }}</td>
                    <td>{{ $doc->nome }}</td>
                    <td>{{ $doc->tipo }}</td>
                    <td>{{ $doc->data_validade }}</td>
                    <td>{{ optional($doc->instituicao)->nome }}</td>
                    <td>{{ optional($doc->vistoria)->id }}</td>
                    <td>
                    <td>{{ optional($doc->relatorio)->titulo }}</td>
                        <a href="{{ route('documentos.show', $doc->id) }}" class="btn btn-primary btn-sm">Ver</a>
                        <a href="{{ route('documentos.edit', $doc->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('documentos.destroy', $doc->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
