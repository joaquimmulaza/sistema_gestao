<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\ProprietarioController;
use App\Http\Controllers\VistoriaController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\UtilizadorController;
use App\Http\Controllers\LogEntryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('instituicoes', InstituicaoController::class)->parameters([
    'instituicoes' => 'instituicao',
]);
Route::resource('proprietarios', ProprietarioController::class);
Route::resource('vistorias', VistoriaController::class); 
Route::resource('relatorios', RelatorioController::class);
Route::resource('documentos', DocumentoController::class);
Route::resource('utilizadores', UtilizadorController::class)->parameters(['utilizadores' => 'utilizadores']);
Route::resource('logs', LogEntryController::class);
Route::get('documentos/instituicao/{id}', [DocumentoController::class, 'listarPorInstituicao'])->name('documentos.instituicao');
Route::get('documentos/vistoria/{id}', [DocumentoController::class, 'listarPorVistoria'])->name('documentos.vistoria');
Route::get('documentos/relatorio/{id}', [DocumentoController::class, 'listarPorRelatorio'])->name('documentos.relatorio');
Route::get('relatorios/vistoria/{vistoria_id}', [RelatorioController::class, 'listarPorVistoria'])->name('relatorios.porVistoria');
Route::get('vistorias/instituicao/{instituicao_id}', [VistoriaController::class, 'listarPorInstituicao'])->name('vistorias.por_instituicao');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/utilizadores/{id}/permissoes', [UtilizadorController::class, 'atribuirPermissoes'])->name('utilizadores.atribuirPermissoes');
Route::post('/inspetores', [UtilizadorController::class, 'registrarInspetor'])->name('inspetores.registrar');
Route::get('/inspetores/{id}/edit', [UtilizadorController::class, 'editarInspetor'])->name('inspetores.edit');
Route::post('/inspetores/{id}/edit', [UtilizadorController::class, 'updateInspetor'])->name('inspetores.update');
Route::delete('/inspetores/{id}/delete', [UtilizadorController::class, 'destroyInspetor'])->name('inspetores.destroy');
Route::get('/inspetores/create', [UtilizadorController::class, 'createInspetor'])->name('inspetores.create');
Route::get('/inspetores', [UtilizadorController::class, 'index_inspetor'])->name('inspetores.index');
Route::get('/relatorios/{relatorio}/pdf', [RelatorioController::class, 'gerarPDF'])->name('relatorios.pdf');
});


Auth::routes();
