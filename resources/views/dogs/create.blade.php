@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="text-center mb-4">Cadastrar Doguinho 🐾</h2>

        <form method="POST" action="{{ route('dogs.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nome do Cachorro</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Raça</label>
                <input type="text" name="breed" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Idade</label>
                <input type="number" name="age" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</div>
@endsection
