<?php

namespace App\Http\Controllers;

use App\Models\Post; // Pastikan namespace-nya sesuai dengan struktur direktori Anda
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_validated', 1)
            ->orderBy('published_at', 'desc')
            ->get();

        foreach ($posts as $post) {
            $post->published_at = Carbon::parse($post->published_at);
        }

        return view('home', ['posts' => $posts]);
    }
    public function pengumuman()
    {
        $posts = Post::orderBy('published_at', 'desc')->get();

            foreach ($posts as $post) {
                $post->published_at = \Carbon\Carbon::parse($post->published_at);
            }

            return view('admin.posts', ['posts' => $posts]);
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
        ->where('is_validated', 1)
            ->orderBy('published_at', 'desc')
            ->get();
        foreach ($posts as $post) {
            $post->published_at = Carbon::parse($post->published_at);
        }
        return view('posts-by-category', ['posts' => $posts, 'category' => $category]);
    }
    
    public function show($post_id)
    {
        $post = Post::find($post_id);
        return view('admin.view-post', compact('post'));
    }

    public function edit($post_id)
    {
        // Find the post based on ID
        $post = Post::find($post_id);

        if (!$post) {
            return redirect()->route('post.index')->with('error', 'Pengumuman tidak ditemukan');
        }

        // Display the edit form with post data
        return view('admin.edit-post', compact('post'));
    }

public function update(Request $request, $post_id)
{
    // Validate the form data
    $validatedData = $request->validate([
        'judul' => 'sometimes|string|max:255',
        'slug' => 'required|string|max:255',
        'isi' => 'required|string',
        'banner' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan aturan validasi gambar
        // Tambahkan aturan validasi lainnya jika diperlukan
    ]);

    // Find the post based on ID
    $post = Post::find($post_id);

    if (!$post) {
        return redirect()->route('post.index')->with('error', 'Pengumuman tidak ditemukan');
    }

    // Update the post with validated data
    $post->update([
        'title' => $validatedData['judul'] ?? $post->title,
        'slug' => $validatedData['slug'],
        'deskripsi' => $validatedData['isi'],
        // Tambahkan kolom lainnya jika diperlukan
    ]);

    // Handle banner upload
    if ($request->hasFile('banner')) {
        // Simpan gambar di dalam direktori 'public/images' tanpa perubahan nama
        $bannerPath = $request->file('banner')->storeAs('images', $request->file('banner')->getClientOriginalName(), 'public');

        // Hapus gambar lama jika ada
        if ($post->banner) {
            Storage::disk('public')->delete($post->banner);
        }

        // Update field 'banner' di basis data dengan path baru
        $post->update(['banner' => $request->file('banner')->getClientOriginalName()]);
    }

    // Redirect to the index page with success message
    return redirect('/post/index')->with('success', 'Pengumuman berhasil diperbarui!');
}
public function create()
    {
        // Assuming you have a view named 'admin.create-post.blade.php' for creating a new post
        return view('admin.create-post');
    }

    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'judul' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'isi' => 'required|string',
        'banner' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        // Add other validation rules as needed
    ]);

    // Handle banner upload
    $bannerPath = null;
    if ($request->hasFile('banner')) {
        $bannerPath = $request->file('banner')->storeAs('images', $request->file('banner')->getClientOriginalName(), 'public');
    }

    // Create a new post with validated data and default is_validated value
    $post = Post::create([
        'title' => $validatedData['judul'],
        'slug' => $validatedData['slug'],
        'description' => $validatedData['isi'],
        'banner' => $bannerPath,
        'published_at' => now(), // You may adjust this based on your requirements
        'is_validated' => 0, // Default value
        // Add other fields as needed
    ]);

    // Redirect to the index page with success message
    return redirect('/post/index')->with('success', 'Pengumuman berhasil dibuat!');
}

}