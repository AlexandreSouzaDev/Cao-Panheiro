<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DogMatchController;

// Rota inicial redireciona pra listagem dos cachorros
Route::get('/', function () {
    return redirect()->route('dogs.index');
})->middleware('auth');

// Autenticação
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Área autenticada
Route::middleware(['auth'])->group(function () {
    Route::get('/dogs', [DogController::class, 'index'])->name('dogs.index');
    Route::get('/dogs/create', [DogController::class, 'create'])->name('dogs.create');
    Route::post('/dogs', [DogController::class, 'store'])->name('dogs.store');
    Route::post('/matches', [DogMatchController::class, 'store'])->name('matches.store');
    Route::get('/dogs/{dog}', [DogController::class, 'show'])->name('dogs.show');
    Route::get('/dogs/{dog}/edit', [DogController::class, 'edit'])->name('dogs.edit');
    Route::put('/dogs/{dog}', [DogController::class, 'update'])->name('dogs.update');
    Route::delete('/dogs/{dog}', [DogController::class, 'destroy'])->name('dogs.destroy');
});