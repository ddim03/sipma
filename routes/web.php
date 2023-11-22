<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;

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

Route::get('/akademik', function () {
    return view('posts-by-category');
});

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminController::class, 'logout']);

Route::get('/', [PostController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });

Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');

Route::get('/post/index', function () {
    return view('admin.posts');
});

Route::get('/arsip/index', function () {
    return view('admin.arsip');
});

Route::get('/post/create', function () {
    return view('admin.create-post');
});

Route::get('/post/view', function () {
    return view('admin.view-post');
});

Route::get('/post/edit', function () {
    return view('admin.edit-post');
});
