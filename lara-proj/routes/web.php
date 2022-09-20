<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilesController as P;
use App\Http\Controllers\PostsController;
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

Auth::routes();

Route::get('/profile/{user}', [P::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [P::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}', [P::class, 'update'])->name('profile.update');

Route::get('/post/create', [PostsController::class, 'create']);
Route::post('/post/store', [PostsController::class, 'store'])->name('post.store');
Route::get('/post/{post}', [PostsController::class, 'show']);
