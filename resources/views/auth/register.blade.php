@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="text-center mb-4">Criar Conta e Cadastrar Doguinho 🐾</h2>

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

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Seu nome</label>
                <input type="text" name="owner_name" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Nome do cachorro</label>
                <input type="text" name="dog_name" class="form-control" required>
            </div>            

            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Confirmar Senha</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Idade do cachorro</label>
                <input type="number" name="age" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Raça</label>
                <input type="text" name="breed" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto do cachorro</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-danger w-100">Criar Conta</button>
        </form>
    </div>
</div>
@endsection
