<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PerfilUserController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\ProjetoTarefasController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [HomeController::class, 'index']);



Route::middleware('auth')->group(function () {
    // Perfil do usuário
    Route::get('/perfil', [PerfilUserController::class, 'show'])->name('perfil');
    Route::post('/perfil/{user}', [PerfilUserController::class, 'update'])->name('perfil.update');
    Route::put('/perfil/{user}', [PerfilUserController::class, 'alterarSenha'])->name('perfil.alterar-senha');


    // Projetos
    Route::get('/projetos', [ProjetoController::class, 'index'])->name('projetos.index');
    Route::get('/projetos/novo', [ProjetoController::class, 'create'])->name('projetos.create');
    Route::get('/projetos/{projeto}/editar', [ProjetoController::class, 'edit'])->name('projetos.edit');
    Route::get('/projetos/{projeto}/detalhes', [ProjetoController::class, 'show'])->name('projetos.show');
    Route::post('/projetos/store', [ProjetoController::class, 'store'])->name('projetos.store');
    Route::put('/projetos/{projeto}/update', [ProjetoController::class, 'update'])->name('projetos.update');

    //Projeto Tarefas

    Route::post('/projetos/{projeto}/tarefas', [ProjetoTarefasController::class, 'store'])->name('projetos.tarefa');
    Route::put('/projetos/{projeto}/tarefas/update', [ProjetoTarefasController::class, 'update'])->name('projetos.update-tarefa');

    Route::post('/completar-tarefa/{tarefa}', [ProjetoTarefasController::class, 'completarTarefa'])->name('completar.tarefa');
    Route::delete('/completar-tarefa/{tarefa}', [ProjetoTarefasController::class, 'descompletarTarefa'])->name('completar.tarefa');

});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
