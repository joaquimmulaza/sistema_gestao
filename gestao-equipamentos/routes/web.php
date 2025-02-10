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
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('instituicoes', InstituicaoController::class);
Route::resource('proprietarios', ProprietarioController::class);
Route::resource('vistorias', VistoriaController::class);
Route::resource('relatorios', RelatorioController::class);
Route::resource('documentos', DocumentoController::class);
Route::resource('utilizadores', UtilizadorController::class);
Route::resource('logs', LogEntryController::class);
