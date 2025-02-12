@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalhes da Vistoria</h2>
    <p><strong>Data:</strong> {{ $vistoria->data }}</p>
    <p><strong>Observações:</strong> {{ $vistoria->observacoes }}</p>
    <p><strong>Instituição:</strong> {{ $vistoria->instituicao->nome ?? 'N/A' }}</p>
    <a href="{{ route('vistorias.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
