<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdController;
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

Route::get('/',[InicioController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/inventario/create',[HomeController::class, 'create'])->name('invent_create');
Route::get('/inventario', [ProdController::class, 'index'])->name('inventario');
Route::post('/producto/create', [ProdController::class, 'create'])->name('prod_create');
Route::post('/producto/rebaje', [ProdController::class, 'rebaje'])->name('prod_rebaje');
