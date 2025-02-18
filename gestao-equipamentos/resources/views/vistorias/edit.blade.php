@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Vistoria</h2>
    <form action="{{ route('vistorias.update', $vistoria->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" name="data" value="{{ $vistoria->data }}" required>
        </div>

        <div class="mb-3">
            <label for="observacoes" class="form-label">Observações</label>
            <textarea class="form-control" name="observacoes" rows="4">{{ $vistoria->observacoes }}</textarea>
        </div>

        <div class="mb-3">
            <label for="instituicao_id" class="form-label">Instituição</label>
            <select name="instituicao_id" class="form-control" required>
                @foreach($instituicoes as $instituicao)
                <option value="{{ $instituicao->id }}" {{ $vistoria->instituicao_id == $instituicao->id ? 'selected' : '' }}>
                    {{ $instituicao->nome }}
                </option>
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

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="{{ route('vistorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
