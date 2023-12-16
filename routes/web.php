<?php

use App\Http\Controllers\AdminPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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

Route::get('/', [PostController::class, 'index']);
Route::get('/categories/{category:nama}', [PostController::class, 'getPostByCategory']);
Route::get('/detail/{post:slug}', [PostController::class, 'show']);

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    });

    Route::post('/logout', [LoginController::class, 'logout']);

    Route::resource('post', AdminPostController::class);
    Route::get('post/review/{post:slug}', [AdminPostController::class, 'review']);
    Route::post('post/validate/{post:slug}', [AdminPostController::class, 'validasi']);

    Route::get('/arsip', function () {
        return view('admin.arsips.index');
    });

    Route::get('/arsip/create', function () {
        return view('admin.arsips.create');
    });

    Route::get('/arsip/edit', function () {
        return view('admin.arsips.edit');
    });

    Route::get('/arsip/show', function () {
        return view('admin.arsips.show');
    });
});
