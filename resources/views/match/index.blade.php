@extends('layouts.app')

@section('content')
<div class="text-center mb-5">
    <h2>Seus Matchs</h2>
</div>

<div class="row">
    @forelse ($matches as $match)
        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white">
                @if ($match->dog->photo)
                    <img src="{{ asset('storage/' . $match->dog->photo) }}" class="card-img-top" alt="{{ $match->dog->name }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $match->dog->name }}</h5>
                    <p class="card-text">Raça: {{ $match->dog->breed }}</p>
                    <p class="card-text">Idade: {{ $match->dog->age }} anos</p>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center">Você ainda não deu match com nenhum cachorro.</p>
    @endforelse
</div>
@endsection
