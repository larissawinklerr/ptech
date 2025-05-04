<?php
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

// Página principal
Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');

// Página Sobre Nós
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

// Página de Contato
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

// APP
Route::prefix('/app')->group(function() {
    Route::get('/rebanho', function() { return 'rebanho'; })->name('app.rebanho');
    Route::get('/procedimentos', function() { return 'procedimentos'; })->name('app.procedimentos');
    Route::get('/comentarios', function() { return 'comentarios'; })->name('app.comentarios');
    Route::get('/manejo', function() { return 'manejo'; })->name('app.manejo');
});
