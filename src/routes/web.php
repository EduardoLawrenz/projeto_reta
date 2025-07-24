<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DeputadoController;
use Illuminate\Support\Facades\Route;

// Rota pública: página inicial antes do login
Route::get('/', function () {
    return view('welcome');
});

// Rota dashboard protegida: somente usuários autenticados e verificados
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rotas protegidas por autenticação (usuários logados)
Route::middleware('auth')->group(function () {

    // Rotas para gerenciamento do perfil do usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para gerenciamento e consulta dos deputados
    Route::get('/deputados', [DeputadoController::class, 'index'])->name('deputados.index');           // lista de deputados
    Route::get('/deputados/{id}', [DeputadoController::class, 'show'])->name('deputados.show');        // detalhes do deputado
    Route::get('/deputados/{id}/exportar', [DeputadoController::class, 'exportar'])->name('deputados.exportar'); // exportar dados
});

// Rotas de autenticação padrão (login, registro, logout, etc)
require __DIR__.'/auth.php';