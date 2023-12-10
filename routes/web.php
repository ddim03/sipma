<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;

Route::get('/login', function () {
    return view('admin.login');
});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/dashboard', [PostController::class, 'readadmin'])->middleware(['auth.admin'])->name('admin.dashboard');
Route::get('/admin/search', [PostController::class, 'searchCategory'])->middleware(['auth.admin'])->name('post.search');
Route::get('/post', [PostController::class, 'pengumuman'])->middleware(['auth.admin'])->name('post.index');
Route::get('/post/view/{post_id}', [PostController::class, 'show'])->middleware(['auth.admin'])->name('post.show');

Route::get('/arsip/index', function () {
    return view('admin.arsip'); 
})->middleware(['auth.admin']);

Route::get('/post/create', function () {
    return view('admin.create-post');
})->middleware(['auth.admin']);

Route::get('/post/view', function () {
    return view('admin.view-post');
})->middleware(['auth.admin']);

Route::get('/{category}', [PostController::class, 'postByCategory'])->name('posts.by.category');
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminController::class, 'logout'])->middleware(['auth.admin']);

Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{post_id}', [PostController::class, 'edit'])->name('edit-post');
Route::put('/post/update/{post_id}', [PostController::class, 'update'])->name('update-post');
Route::delete('/post/delete/{post_id}', [PostController::class, 'destroy'])->name('delete-post');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

Route::get('/post-by-category', fn () => view('posts-by-category'))->name('posts-by-category');
Route::get('/search/{category}', [PostController::class, 'searchCategory'])->name('searchCategory');
