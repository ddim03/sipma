<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->where('is_validated', 1)->paginate(4);

        $posts = $this->removeHTML($posts);

        return view('home', ['posts' => $posts]);
    }

    public function getPostByCategory(Category $category)
    {
        $posts = $category->posts->where('is_validated', 1);
        $posts = $this->removeHTML($posts);
        return view('posts-by-category', [
            'title' => $category->nama,
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('detail', ['post' => $post]);
    }

    public function removeHTML($posts)
    {
        foreach ($posts as $post) {
            if (Str::length($post) > 110) {
                $post->isi = Str::limit(strip_tags($post->isi), 110);
            } else {
                $post->isi = strip_tags($post->isi);
            }
        }
        return $posts;
    }
}
