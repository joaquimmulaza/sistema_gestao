@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nova Vistoria</h2>
    <form action="{{ route('vistorias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" name="data" required>
        </div>
        <div class="mb-3">
            <label for="observacoes" class="form-label">Observações</label>
            <textarea class="form-control" name="observacoes" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label for="instituicao_id" class="form-label">Instituição</label>
            <select name="instituicao_id" class="form-control" required>
                @foreach($instituicoes as $instituicao)
                <option value="{{ $instituicao->id }}">{{ $instituicao->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="inspetor_id" class="form-label">Inspetor Responsável</label>
            <select name="inspetor_id" class="form-control" required>
                @foreach($inspetores as $inspetor)
                    <option value="{{ $inspetor->id }}">{{ $inspetor->nome }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
