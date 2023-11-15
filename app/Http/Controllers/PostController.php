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