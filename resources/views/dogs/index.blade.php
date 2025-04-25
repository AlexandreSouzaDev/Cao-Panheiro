@extends('layouts.app')

@section('content')
<div class="text-center mb-5">
    <h2>Explore os cachorros disponíveis</h2>
</div>

<div class="row">
    @forelse ($dogs as $dog)
        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white">
                @if ($dog->image)
                    <img src="{{ asset('storage/' . $dog->image) }}" class="card-img-top" alt="{{ $dog->name }}">
                @else
                    <img src="https://placehold.co/400x300" class="card-img-top" alt="Sem foto">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $dog->name }}</h5>
                    <p class="card-text">Raça: {{ $dog->breed }}</p>
                    <p class="card-text">Idade: {{ $dog->age }} anos</p>

                    <form method="POST" action="{{ route('matches.store', $dog->id) }}">
                        @csrf
                        <button class="btn btn-danger w-100">Dar Match ❤️</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center">Nenhum cachorro disponível no momento.</p>
    @endforelse
</div>
@endsection
