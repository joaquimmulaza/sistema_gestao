@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Relatórios da Vistoria #{{ request()->route('vistoria_id') }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($relatorios as $relatorio)
            <tr>
                <td>{{ $relatorio->id }}</td>
                <td>{{ $relatorio->titulo }}</td>
                <td>{{ $relatorio->data }}</td>
                <td>
                    <a href="{{ route('relatorios.show', $relatorio->id) }}" class="btn btn-info btn-sm">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('relatorios.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
