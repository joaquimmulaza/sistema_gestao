@extends('layouts.app')

@section('title', 'Proprietários')

@section('content')
<div class="container">
    <a href="{{ route('proprietarios.create') }}" class="btn btn-primary mb-3">Novo Proprietário</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Nº Bilhete</th>
                <th>Validade do Bilhete</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proprietarios as $proprietario)
                <tr>
                    <td>{{ $proprietario->nome }}</td>
                    <td>{{ $proprietario->telefone }}</td>
                    <td>{{ $proprietario->n_bilhete }}</td>
                    <td>{{ $proprietario->validade_bilhete }}</td>
                    <td>
                        <a href="{{ route('proprietarios.edit', $proprietario) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('proprietarios.destroy', $proprietario) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
