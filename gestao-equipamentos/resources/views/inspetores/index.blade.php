<!-- index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Lista de Inspetores</h2>
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
            @foreach($inspetores as $inspetor)
            <tr>
                <td>{{ $inspetor->id }}</td>
                <td>{{ $inspetor->nome }}</td>
                <td>
                    <a href="{{ route('inspetores.edit', $inspetor->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('inspetores.destroy', $inspetor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem a certeza que deseja excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection