<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function getPostByCategory(Category $category)
    {
        return view('posts-by-category', [
            'title' => $category->nama,
        ]);
    }

    public function show(Post $post)
    {
        return view('detail', ['post' => $post]);
    }

    public function search($keyword)
    {
        return view('search', ['keyword' => $keyword]);
    }
}
