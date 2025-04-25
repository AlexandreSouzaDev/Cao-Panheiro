@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="mb-4">Bem-vindo, {{ Auth::user()->name }}!</h1>
    <p class="lead">Aqui você pode cadastrar seu cachorro, ver possíveis matchs e editar seu perfil.</p>

    <div class="d-grid gap-3 mt-5 col-md-6 mx-auto">
        <a href="{{ route('dogs.create') }}" class="btn btn-danger btn-lg">Cadastrar Meu Cachorro</a>
        <a href="{{ route('matches.index') }}" class="btn btn-outline-light btn-lg">Ver Matchs</a>
        <a href="{{ route('dogs.index') }}" class="btn btn-outline-light btn-lg">Explorar Cachorros</a>
    </div>
</div>
@endsection
