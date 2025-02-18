@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalhes do Relatório</h2>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $relatorio->titulo }}</h4><br>
            <p><strong>Data:</strong> {{ $relatorio->data }}</p>
            <p><strong>Descrição: </strong>{{ $relatorio->descricao }}</p>
            <p><strong>Vistoria:</strong> {{ $relatorio->vistoria_id }}</p>
            <p><strong>Inspetor:</strong> {{$relatorio->inspetor->nome  ?? 'N/A'}}</p>
        </div>
    </div>
    <a href="{{ route('relatorios.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    <a href="{{ route('relatorios.pdf', $relatorio->id) }}" class="btn btn-info mt-3">Gerar Relatório</a>
</div>
@endsection
