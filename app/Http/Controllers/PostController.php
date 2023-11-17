<?php

namespace App\Http\Controllers;

use App\Models\Post; // Pastikan namespace-nya sesuai dengan struktur direktori Anda
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Admin;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('published_at', 'desc')->get();

        foreach ($posts as $post) {
            $post->published_at = Carbon::parse($post->published_at);
        }

        return view('home', ['posts' => $posts]);
    }
    public function postByCategory($category)
    {
        // Ambil ID kategori berdasarkan nama kategori
        $categoryId = Category::where('name', $category)->value('category_id');

        // Validasi apakah kategori ditemukan
        if (!$categoryId) {
            abort(404);
        }

        // Ambil post berdasarkan kategori
        $posts = Post::where('category_id', $categoryId)
            ->orderBy('published_at', 'desc')
            ->get();

        foreach ($posts as $post) {
            $post->published_at = Carbon::parse($post->published_at);
        }

        return view('posts-by-category', ['posts' => $posts, 'category' => $category]);
    }
}




// class PostController extends Controller
// {
//     public function index()
// {
//     $posts = Post::orderBy('published_at', 'desc')->get(); // Mengambil data terbaru
//     foreach ($posts as $post) {
//         $post->published_at = $post->published_at->toDateString(); // Konversi ke format tanggal
//     }
//     return view('home', ['posts' => $posts]);
// }

// }