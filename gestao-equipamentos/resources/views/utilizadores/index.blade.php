<!-- index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Lista de Utilizadores</h2>
    <a href="{{ route('inspetores.create') }}" class="btn btn-success">Registrar Inspetor</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($utilizadores as $utilizador)
            <tr>
                <td>{{ $utilizador->id }}</td>
                <td>{{ $utilizador->nome }}</td>
                <td>
                    <a href="{{ route('utilizadores.edit', $utilizador->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('utilizadores.destroy', $utilizador->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection