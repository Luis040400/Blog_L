<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
return view('login');
});*/

//Usuarios
Route::get('/', [RegisterController::class, 'index'])->name('login');
Route::post('/custom-login', [RegisterController::class, 'customLogin'])->name('login.custom');
Route::get('/registration', [RegisterController::class, 'registration'])->name('register-user');
Route::post('/custom-registration', [RegisterController::class, 'customRegistration'])->name('register.custom');
Route::get('/signout', [RegisterController::class, 'signOut'])->name('signout');

//Esto es del post

Route::get('/post', [PostController::class, 'index'])->name('post');
Route::get('/post/crear', [PostController::class, 'crear'])->name('post.crear');

Route::post('/post', [PostController::class, 'store'])->name('post');

Route::get('/post/{id}', [PostController::class, 'show'])->name('post.edit');

Route::patch('/post/{id}', [PostController::class, 'update'])->name('post.update');

//Este esta en prueba
Route::patch('/post/state/{id}', [PostController::class, 'State'])->name('post.state');
//---------------------------

Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.delete');

Route::get('/post/details/{id}', [PostController::class, 'details'])->name('post.detalles');
Route::post('/post/details', [CommentController::class, 'store'])->name('post.comentarios');

Route::delete('/comment/destroy/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
