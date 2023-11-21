<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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

Route::get('/', function () {
    return view('home');
});

Route::get('/post-by-category', fn () => view('posts-by-category'))->name('posts-by-category');

Route::get('/admin', function () {
    return view('admin.login');
});

Route::get('/dashboard', function() {
    return view('dashboard');
});

Route::get('/pengumuman', function() {
    return view('pengumuman');
});

Route::get('/arsip', function() {
    return view('arsip');
});
Route::get('/search', [PostController::class, 'search'])->name('search');

Route::get('/', [PostController::class, 'index']);

Route::get('/{category}', [PostController::class, 'postByCategory'])->name('posts.by.category');

Route::get('/search/{category}', [PostController::class, 'searchCategory'])->name('searchCategory');
