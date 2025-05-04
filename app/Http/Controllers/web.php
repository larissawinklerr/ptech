<?php
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;

// Página principal
Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');

// Página Sobre Nós
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

// Página de Contato
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');

// Login
Route::get('/login', function() {
    return 'login';
});

// APP
Route::prefix('/app')->group(function() {
    Route::get('/rebanho', function() { return 'rebanho'; })->name('app.rebanho');
    Route::get('/lancarnascimento', function() { return 'lancarnascimento'; })->name('app.lancarnascimento');
    Route::get('/lancarmorte', function() { return 'lancarmorte'; })->name('app.lancarmorte');
    Route::get('/manejo', function() { return 'manejo'; })->name('app.manejo');
});
