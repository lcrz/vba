<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MacroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserController;

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

/**
 * Notas:
 * 
 * En esta ruta {macro} es un comodin y puede signicar cualquier cosa, com /macro/editar/1
 * por eso es bueno usar el whereNumber y otra opcion para delimitar y que no tome otra ruta por error
 *  Route::get('macro/{macro}', [MacroController::class , 'show'])->whereNumber('macro');
 */


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {



    Route::get('dashboard', [MacroController::class, 'macros']);

    Route::get('macro/{macro}', [MacroController::class, 'show'])->whereNumber('macro');
    Route::get('categoria/{categoria}', [MacroController::class, 'categoria'])->whereNumber('categoria');
    Route::post('resultado', [MacroController::class, 'busqueda']);
    Route::get('macros', [MacroController::class, 'macros']);

    Route::resource('admin/macros', MacroController::class);
    Route::resource('admin/categorias', CategoriaController::class);
    Route::resource('admin/users', UserController::class);
});

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
Route::get('/', function () {
    return view('layouts.landing');
});
Route::get(
    'stats',
    function () {
        return view('macro.stats');
    }

);
 


/*
Route::get('macro/', [MacroController::class , 'index'])->name('macros.index');
Route::get('macro/crear/', [MacroController::class , 'create'])->name('macros.create');
Route::post('macro/store/', [MacroController::class , 'store'])->name('macros.store');
Route::delete('macro/{id}', [MacroController::class , 'destroy'])->name('macros.destroy');
Route::get('macro/ver/{macro}', [MacroController::class , 'show'])->name('macros.show');
Route::get('macro/editar/{id}', [MacroController::class , 'edit'])->name('macros.edit');
Route::patch('macro/update/{macro}', [MacroController::class , 'update'])->name('macros.update'); 
*/
