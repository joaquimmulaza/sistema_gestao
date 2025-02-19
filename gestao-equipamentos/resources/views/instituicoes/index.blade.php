@extends('layouts.app')

@section('title', 'Instituições')

@section('content')
<div class="container">
    <a href="{{ route('instituicoes.create') }}" class="btn btn-primary mb-3">Nova Instituição</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Status</th>
                <th>Município</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($instituicoes as $instituicao)
                <tr>
                    <td>{{ $instituicao->nome }}</td>
                    <td>
                        @if($instituicao->activa == 1)
                            Ativa
                        @else
                            Inativa
                        @endif
                        </td>
                        <td>{{ $instituicao->endereco->municipio ?? 'Não informado' }}</td>
                    <td>
                        <a href="{{ route('instituicoes.edit', $instituicao->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('instituicoes.destroy', $instituicao->id) }}" method="POST" class="d-inline">
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
