<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Livewire\SearchData;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index']);
Route::get('/about', function () {
    return view('about');
});
Route::get('/categories/{category:nama}', [PostController::class, 'getPostByCategory']);
Route::get('/detail/{post:slug}', [PostController::class, 'show']);
Route::get('/search/{search}', [PostController::class, 'search'])->name('post.search');
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
});

Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [LoginController::class, 'logout']);

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('post', AdminPostController::class);
    Route::get('post/review/{post:slug}', [AdminPostController::class, 'review'])->name('post.review');
    Route::put('post/revisi/{post:slug}', [AdminPostController::class, 'revisi'])->name('post.revisi');
    Route::put('post/validasi/{post:slug}', [AdminPostController::class, 'validasi'])->name('post.validasi');

    Route::resource('/arsip', ArsipController::class);
});
