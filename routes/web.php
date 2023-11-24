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

// Route::get('/akademik', function () {
//     return view('posts-by-category');
// });

Route::get('/login', function () {
    return view('admin.login');
});

Route::get('/', [PostController::class, 'index']);

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/post/index', [PostController::class, 'pengumuman']);
Route::get('/post/view/{post_id}', [PostController::class, 'show'])->name('post.show');

Route::get('/arsip/index', function () {
    return view('admin.arsip');
});

Route::get('/post/create', function () {
    return view('admin.create-post');
});

Route::get('/post/view', function () {
    return view('admin.view-post');
});
Route::get('/{category}', [PostController::class, 'postByCategory'])->name('posts.by.category');
Route::get('/post/editt', function () { return view('admin.edit-post'); });
Route::get('/post/edit/{post_id}', [PostController::class, 'edit'])->name('edit-post');;
Route::put('/post/update/{post_id}', [PostController::class, 'update'])->name('update-post');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');