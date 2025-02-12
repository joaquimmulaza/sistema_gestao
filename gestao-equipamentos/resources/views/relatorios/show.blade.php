@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalhes do Relatório</h2>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $relatorio->titulo }}</h4>
            <p><strong>Data:</strong> {{ $relatorio->data }}</p>
            <p><strong>Descrição:</strong></p>
            <p>{{ $relatorio->descricao }}</p>
            <p><strong>Vistoria:</strong> {{ $relatorio->vistoria_id }}</p>
        </div>
    </div>
    <a href="{{ route('relatorios.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
