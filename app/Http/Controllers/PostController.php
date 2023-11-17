<?php

namespace App\Http\Controllers;

use App\Models\Post; // Pastikan namespace-nya sesuai dengan struktur direktori Anda
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_validated', 1)->get();
        foreach ($posts as $post) {
            $post->published_at = Carbon::parse($post->published_at);
        }

        return view('home', ['posts' => $posts]);
    }
    public function search(Request $request)
{
    $query = $request->input('query');

    if ($query) {
        $posts = Post::where('title', 'like', '%' . $query . '%')->orderBy('published_at', 'desc')->get();
    } else {
        $posts = Post::orderBy('published_at', 'desc')->get();
    }

    foreach ($posts as $post) {
        $post->published_at = Carbon::parse($post->published_at);
    }

    return view('home', ['posts' => $posts, 'query' => $query]);
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

public function searchCategory(Request $request)
{
    $query = $request->input('query');

    if ($query) {
        $posts = Post::where('title', 'like', '%' . $query . '%')->orderBy('published_at', 'desc')->get();
    } else {
        $posts = Post::orderBy('published_at', 'desc')->get();
    }

    foreach ($posts as $post) {
        $post->published_at = Carbon::parse($post->published_at);
    }
    return view('posts-by-category', ['posts' => $posts, 'category' => $query]);

}

}