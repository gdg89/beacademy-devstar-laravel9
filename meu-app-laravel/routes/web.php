<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\{
    UserController,
    ViaCepController
};

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


Route::get('/', function(){
    return view('welcome');
});

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('/users/{id}',[UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/user', [Usercontroller::class, 'store'])->name('users.store');
Route::get('/users', [UserController::class,'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');


//Route::get('/users-create', [UserController::class, 'create'])->name('users.create'); //Solução minha  antes de mudar a orden das rotas como indicou o prof., para evitar o if do show que renderiza pro index qualquer parametro apos users/ .



//via cep web service
Route::get('/viacep',[viaCepController::class, 'index'])->name('viacep.index');// ciramos formulario

Route::post('/viacep',[viaCepController::class, 'index'])->name('viacep.index.post');

Route::get('/viacep/{cep}',[viaCepController::class, 'show'])->name('viacep.show');