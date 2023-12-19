<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArsipController;

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

    Route::get('/dashboard', [PostController::class, 'readadmin'])->name('dashboard')->middleware('auth');
    Route::get('/post', [PostController::class, 'pengumuman'])->name('post.index')->middleware('auth');
    Route::get('/post/view/{post_id}', [PostController::class, 'show'])->name('post.show')->middleware('auth');
    Route::get('/post/view', function () { return view('admin.view-post');})->middleware('auth');
    Route::get('/post/create', function () {return view('admin.create-post');})->middleware('auth');
    
    Route::get('/arsip/index', [ArsipController::class, 'index'])->name('arsip.index')->middleware('auth');
    Route::get('/arsip/create', [ArsipController::class, 'create'])->name('arsip.create')->middleware('auth');
    Route::post('/arsip/store', [ArsipController::class, 'store'])->name('arsip.store')->middleware('auth');
    Route::get('/arsip/view/{arsip}', [ArsipController::class, 'show'])->name('arsip.show')->middleware('auth');
    Route::get('/arsip/edit/{arsip}', [ArsipController::class, 'edit'])->name('arsip.edit')->middleware('auth');
    Route::put('/arsip/update/{arsip}', [ArsipController::class, 'update'])->name('arsip.update')->middleware('auth');

Route::get('/', [PostController::class, 'index']);


Route::get('/validate', function () {
    return view('admin.validate')->middleware('auth');
});
Route::get('/validate', [PostController::class, 'indexkaprodi'])->middleware('auth');
Route::get('/validate/review/{post_id}', [PostController::class, 'review'])->name('review-post')->middleware('auth');
Route::get('/validate/{post_id}', [PostController::class, 'validatePost'])->name('validate-post')->middleware('auth');
Route::put('/validate/review/{post_id}', [PostController::class, 'updatereview'])->name('update-review')->middleware('auth');
Route::get('/live-search', [PostController::class, 'liveSearch'])->name('post.liveSearch');
Route::get('/post/detail/{id}', [PostController::class, 'detail'])->name('post.detail');


Route::get('/{category}', [PostController::class, 'postByCategory'])->name('posts.by.category');
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login')->middleware('guest');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.login')->middleware('guest');
Route::post('/logout', [AdminController::class, 'logout']);

Route::post('/post/store', [PostController::class, 'store'])->name('post.store')->middleware('auth');
Route::get('/post/edit/{post_id}', [PostController::class, 'edit'])->name('edit-post')->middleware('auth');
Route::put('/post/update/{post_id}', [PostController::class, 'update'])->name('update-post')->middleware('auth');
Route::delete('/post/delete/{post_id}', [PostController::class, 'destroy'])->name('delete-post')->middleware('auth');

Route::get('/post-by-category', fn () => view('posts-by-category'))->name('posts-by-category');
Route::get('/search/{category}', [PostController::class, 'searchCategory'])->name('searchCategory');
