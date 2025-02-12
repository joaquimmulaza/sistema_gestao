@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Relatórios</h2>
    <a href="{{ route('relatorios.create') }}" class="btn btn-success">Novo Relatório</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Data</th>
                <th>Vistoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($relatorios as $relatorio)
            <tr>
                <td>{{ $relatorio->id }}</td>
                <td>{{ $relatorio->titulo }}</td>
                <td>{{ $relatorio->data }}</td>
                <td>{{ $relatorio->vistoria_id }}</td>
                <td>
                    <a href="{{ route('relatorios.show', $relatorio->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('relatorios.edit', $relatorio->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('relatorios.destroy', $relatorio->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Excluir este relatório?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
