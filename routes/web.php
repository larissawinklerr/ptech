<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalDetalhesController;
use App\Http\Controllers\RebanhoController;
use App\Http\Controllers\ProcedimentoController;
use App\Http\Controllers\RegisterController;

// Rotas públicas com cache desabilitado
    Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
    Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
    Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
    Route::post('/login', [LoginController::class, 'autenticar']);
    Route::get('/register', [RegisterController::class, 'show'])->name('site.register');
    Route::post('/register', [RegisterController::class, 'store'])->name('site.register.store');

// Logout
Route::get('/logout', [LoginController::class, 'sair'])->name('site.logout');

// Rotas protegidas
Route::middleware(['auth'])->prefix('app')->group(function () {
    Route::get('/painel', [PrincipalController::class, 'painel'])->name('app.painel');

    // Rotas de animais
    Route::get('/animais', [AnimalController::class, 'index'])->name('app.animais.index');
    Route::get('/animais/create', [AnimalController::class, 'create'])->name('app.animais.create');
    Route::post('/animais', [AnimalController::class, 'store'])->name('app.animais.store');
    Route::get('/animais/{id}', [AnimalController::class, 'show'])->name('app.animais.show');
    Route::get('/animais/{id}/edit', [AnimalController::class, 'edit'])->name('app.animais.edit');
    Route::put('/animais/{id}', [AnimalController::class, 'update'])->name('app.animais.update');
    Route::delete('/animais/{id}', [AnimalController::class, 'destroy'])->name('app.animais.destroy');
    Route::get('/animais/{id}/relatorio', [AnimalController::class, 'gerarRelatorio'])->name('app.animais.relatorio');

    // Detalhes do animal
    Route::get('/animal-detalhes/{id}', [AnimalDetalhesController::class, 'show'])->name('app.animal_detalhes.show');
    Route::get('/animal-detalhes/{id}/edit', [AnimalDetalhesController::class, 'edit'])->name('app.animal_detalhes.edit');
    Route::put('/animal-detalhes/{id}', [AnimalDetalhesController::class, 'update'])->name('app.animal_detalhes.update');

    // Rebanhos
    Route::get('/rebanhos', [RebanhoController::class, 'index'])->name('app.rebanhos.index');
    Route::get('/rebanhos/create', [RebanhoController::class, 'create'])->name('app.rebanhos.create');
    Route::post('/rebanhos', [RebanhoController::class, 'store'])->name('app.rebanhos.store');
    Route::get('/rebanhos/{id}', [RebanhoController::class, 'show'])->name('app.rebanhos.show');
    Route::patch('/rebanhos/remover-animal/{id}', [RebanhoController::class, 'removerAnimal'])->name('rebanhos.remover.animal');
    Route::get('/rebanhos/{id}/edit', [RebanhoController::class, 'edit'])->name('app.rebanhos.edit');
    Route::put('/rebanhos/{id}', [RebanhoController::class, 'update'])->name('app.rebanhos.update');
    Route::delete('/rebanhos/{id}', [RebanhoController::class, 'destroy'])->name('app.rebanhos.destroy');

    // Procedimentos
    Route::get('/procedimentos', [ProcedimentoController::class, 'index'])->name('app.procedimentos.index');
    Route::get('/procedimentos/create', [ProcedimentoController::class, 'create'])->name('app.procedimentos.create');
    Route::post('/procedimentos', [ProcedimentoController::class, 'store'])->name('app.procedimentos.store');
    Route::get('/procedimentos/{id}/edit', [ProcedimentoController::class, 'edit'])->name('app.procedimentos.edit');
    Route::put('/procedimentos/{id}', [ProcedimentoController::class, 'update'])->name('app.procedimentos.update');
    Route::delete('/procedimentos/{id}', [ProcedimentoController::class, 'destroy'])->name('app.procedimentos.destroy');
});
