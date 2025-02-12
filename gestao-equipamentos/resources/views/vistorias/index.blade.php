@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Vistorias</h2>
    <a href="{{ route('vistorias.create') }}" class="btn btn-primary mb-3">Nova Vistoria</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Instituição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vistorias as $vistoria)
            <tr>
                <td>{{ $vistoria->id }}</td>
                <td>{{ $vistoria->data }}</td>
                <td>{{ $vistoria->instituicao->nome ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('vistorias.show', $vistoria->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('vistorias.edit', $vistoria->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('vistorias.destroy', $vistoria->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
