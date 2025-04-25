@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <h2 class="text-center mb-4">Entrar no Cão-Panheiro</h2>

        {{-- Exibe erros de validação --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Mensagem de erro de sessão --}}
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control bg-dark text-white border-secondary" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" id="password" class="form-control bg-dark text-white border-secondary" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Lembrar de mim</label>
            </div>

            <button type="submit" class="btn btn-danger w-100">Entrar</button>

            <div class="text-center mt-3">
                <span>Não tem uma conta?</span>
                <a href="{{ route('register') }}" class="text-decoration-none text-light fw-bold">Cadastre-se</a>
            </div>
        </form>
    </div>
</div>
@endsection
