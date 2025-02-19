@extends('layouts.auth')

@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Faça login para iniciar a sessão</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group mb-3">
                <input id="email" type="text" class="form-control @error('nome') is-invalid @enderror" 
                    name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus 
                    placeholder="Nome do Utilizador">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                    name="password" required autocomplete="current-password" placeholder="Senha">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            Lembrar-me
                        </label>
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Acessar</button>
                </div>
            </div>
        </form>

        <p class="mb-1">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Esqueci minha senha</a>
            @endif
        </p>
    </div>
</div>
@endsection
