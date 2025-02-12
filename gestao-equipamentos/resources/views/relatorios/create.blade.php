@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Novo Relatório</h2>
    <form action="{{ route('relatorios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" class="form-control" name="data" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Vistoria</label>
            <select class="form-control" name="vistoria_id">
                @foreach($vistorias as $vistoria)
                    <option value="{{ $vistoria->id }}">{{ $vistoria->id }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
