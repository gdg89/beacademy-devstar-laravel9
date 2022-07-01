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

Route::get('/users',[UserController::class,'index'])->name('user.index');

Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');


//via cep web service
Route::get('/viacep',[viaCepController::class, 'index'])->name('viacep.index');// ciramos formulario

Route::post('/viacep',[viaCepController::class, 'index'])->name('viacep.index.post');

Route::get('/viacep/{cep}',[viaCepController::class, 'show'])->name('viacep.show');