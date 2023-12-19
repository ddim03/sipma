<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function index()
    {
        if (!Gate::allows('is_kaprodi', Post::class)) {
            return view('admin.posts.index');
        }
        return view('admin.posts.validate');
    }

    public function create()
    {
        if (Gate::allows('is_kaprodi', Post::class)) {
            abort(403);
        }
        return view('admin.posts.create');
    }

    public function show(Post $post)
    {
        if (Gate::allows('is_kaprodi', Post::class)) {
            abort(403);
        }
        return view('admin.posts.show', ['post' => Post::where('slug', $post->slug)->first()]);
    }

    public function edit(Post $post)
    {
        if (Gate::allows('is_kaprodi', Post::class)) {
            abort(403);
        }
        return view('admin.posts.edit', ['post' => Post::where('slug', $post->slug)->first()]);
    }

    public function store(Request $request)
    {
        if (Gate::allows('is_kaprodi', Post::class)) {
            abort(403);
        }
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'isi' => 'required',
            'gambar' => 'required|image|file|max:2000'
        ]);
        $validatedData['category_id'] = auth()->user()->id;
        $validatedData['admin_id'] = auth()->user()->id;
        $validatedData['gambar'] = $request->file('gambar')->store('images');
        Post::create($validatedData);
        return redirect()->route('post.index')->with('success', 'success');
    }

    public function update(Request $request, Post $post)
    {
        if (Gate::allows('is_kaprodi', Post::class)) {
            abort(403);
        }
        $rules = [
            'judul' => 'required|max:255',
            'isi' => 'required',
            'gambar' => 'image|file|max:2000'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required | unique:posts';
        }

        $validatedData = $request->validate($rules);
        $validatedData['category_id'] = auth()->user()->id;
        $validatedData['admin_id'] = auth()->user()->id;
        if ($request->file('gambar')) {
            if ($request->oldGambar) {
                Storage::delete($request->oldGambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('images');
        }
        Post::where('id', $post->id)->update($validatedData);
        return redirect()->route('post.index')->with('success', 'success');
    }

    public function destroy(Post $post)
    {
        if ($post->gambar) {
            Storage::delete($post->gambar);
        }
        Post::where('id', $post->id)->delete();
        return redirect()->route('post.index')->with('success', 'Product deleted successfully!');
    }

    public function review(Post $post)
    {
        if (!Gate::allows('is_kaprodi', Post::class)) {
            abort(403);
        }
        return view('admin.posts.review', ['post' => Post::where('slug', $post->slug)->first()]);
    }

    public function revisi(Request $request, Post $post)
    {
        if (!Gate::allows('is_kaprodi', Post::class)) {
            abort(403);
        }
        $validatedData = $request->validate(['isi' => 'required']);
        Post::where('slug', $post->slug)->update($validatedData);
        return redirect()->route('post.index')->with('success', 'Product deleted successfully!');
    }

    public function validasi(Post $post)
    {
        if (!Gate::allows('is_kaprodi', Post::class)) {
            abort(403);
        }
        $data = Post::where('slug', $post->slug)->first();
        if ($data->is_validated == 0) {
            $data->is_validated = 1;
        }
        $data->save();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}
