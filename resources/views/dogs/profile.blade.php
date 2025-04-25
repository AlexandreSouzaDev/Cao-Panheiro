@extends('layouts.app')

@section('content')
<div class="text-center mb-4">
    <h2>Perfil do {{ Auth::user()->name }}</h2>
</div>

<div class="card mx-auto shadow-sm" style="max-width: 500px;">
    @if(Auth::user()->image)
    <div class="text-center mb-4">
    <h2>Perfil do {{ Auth::user()->name }}</h2>
</div>

<div class="card mx-auto shadow-sm" style="max-width: 500px;">
    @if(Auth::user()->image)
    <img src="{{ asset('storage/dogs/' . $dog->image) }}" alt="Foto do cachorro">

    @else
    <img src="{{ asset('storage/') }}" class="card-img-top" alt="Foto padrão">
    @endif

    <div class="card-body">
        <h4 class="card-title">{{ Auth::user()->name }}</h4>
        <p class="card-text">
            <strong>Raça:</strong> {{ Auth::user()->breed }}<br>
            <strong>Idade:</strong> {{ Auth::user()->age }} anos<br>
            <strong>Descrição:</strong> {{ Auth::user()->description }}
        </p>
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Editar Perfil</a>
    </div>
</div><img src="{{ asset('storage/' . Auth::user()->image) }}" class="card-img-top" alt="Foto do cachorro">
    @endif


    <div class="card-body">
        <h4 class="card-title">{{ Auth::user()->name }}</h4>
        <p class="card-text">
            <strong>Raça:</strong> {{ Auth::user()->breed}}<br>
            <strong>Idade:</strong> {{ Auth::user()->age }}<br>
            <strong>Descrição:</strong> {{ Auth::user()->description }}
        </p>
    </div>
</div>
@endsection
