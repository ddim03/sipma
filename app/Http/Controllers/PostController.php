<?php
namespace App\Http\Controllers;

use App\Models\Post; // Pastikan namespace-nya sesuai dengan struktur direktori Anda
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        // Mendapatkan admin yang sedang login
        $admin = Auth::guard('admin')->user();

        // Periksa apakah objek Admin ditemukan
        if (!$admin) {
            // Jika tidak ditemukan, Anda dapat mengambil tindakan yang sesuai, seperti me-redirect ke halaman login
            return redirect()->route('admin.login')->with('error', 'Admin tidak ditemukan. Silakan login kembali.');
        }

        // Mengambil category_id dari admin yang sedang login
        $categoryId = $admin->category_id;

        // Mengambil pengumuman (post) berdasarkan category_id dan diurutkan berdasarkan published_at
        $posts = $admin->posts;

        foreach ($posts as $post) {
            $post->published_at = \Carbon\Carbon::parse($post->published_at);
        }

        return view('admin.posts', ['posts' => $posts, 'admin' => $admin]);
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

            return view('admin.edit-post', compact('post'));
        }

        public function update(Request $request, $post_id)
        {
            // Validate the form data
            $validatedData = $request->validate([
                'judul' => 'sometimes|string|max:255',
                'slug' => 'required|string|max:255',
                'deskripsi' => 'required|string',
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
                'deskripsi' => strip_tags($validatedData['deskripsi']),
                // Tambahkan kolom lainnya jika diperlukan
            ]);
        
            // Handle banner upload
            if ($request->hasFile('banner')) {
                $uploadedBanner = $request->file('banner');
        
                // Use storeAs to specify the filename without a subdirectory
                $bannerPath = $uploadedBanner->storeAs('', 'banner_' . $post->post_id . '.' . $uploadedBanner->getClientOriginalExtension(), 'public');
        
                // Hapus gambar lama jika ada
                if ($post->banner) {
                    Storage::disk('public')->delete($post->banner);
                }
        
                // Update the post with the new banner path
                $post->update(['banner' => $bannerPath]);
            }
        
            // Redirect or respond as needed
            return redirect('/post')->with('success', 'Post updated successfully');
        }
        
        

    public function destroy($post_id)
    {
        $post = Post::find($post_id);

        if (!$post) {
            return redirect('/post')->with('error', 'Pengumuman tidak ditemukan');
        }

        // Hapus gambar jika ada
        if ($post->banner) {
            Storage::disk('public')->delete($post->banner);
        }

        // Hapus post dari basis data
        $post->delete();

        return redirect('/post/')->with('success', 'Pengumuman berhasil dihapus');
    }
    public function readadmin(Request $request)
    {
        $postsQuery = Post::query();

        if ($request->has('search')) {
            // Tambahkan kondisi pencarian berdasarkan judul
            $postsQuery->where('title', 'LIKE', '%' . $request->input('search') . '%');
        }
    
        // Get paginated results
        $posts = $postsQuery->paginate(10);

        // Count the total number of posts
        $totalPosts = Post::count();

        // Count the number of validated posts
        $validatedPosts = Post::where('is_validated', 1)->count();

        // Count the number of posts awaiting validation
        $waitingValidationPosts = Post::where('is_validated', 0)->count();

        // Count the number of archived posts
        // Note: Adjust this based on the actual criteria for archived posts
        // $archivedPosts = Post::where('is_archived', 1)->count();

        // Pass the counts and posts to the view
        return view('/admin/dashboard', [
            'totalPosts' => $totalPosts,
            'validatedPosts' => $validatedPosts,
            'waitingValidationPosts' => $waitingValidationPosts,
            // 'archivedPosts' => $archivedPosts,
            'posts' => $posts,
        ]);
    }

    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'title' => 'required|string',
        'slug' => 'required|string',
        'deskripsi' => 'required|string',
        'banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // Add other fields as needed
    ]);

    if (in_array(null, $validatedData)) {
        // Redirect back with an error message
        dd('Please fill in all required fields'); // Tambahkan ini untuk memeriksa pesan
        return redirect('/post')->with('error', 'Please fill in all required fields');
    }
    
    $validatedData['category_id'] = Auth::guard('admin')->user()->admin_id;
    $validatedData['admin_id'] = Auth::guard('admin')->user()->admin_id;
    $validatedData['published_at'] = now();
    $validatedData['is_validated'] = 0; // Assuming default is 0

    $post = Post::create($validatedData);

    $uploadedBanner = $request->file('banner');

    // Use storeAs to specify the filename without a subdirectory
    $bannerPath = $uploadedBanner->storeAs('', 'banner_' . $post->post_id . '.' . $uploadedBanner->getClientOriginalExtension(), 'public');

    // Update the post with the new banner path
    $post->update(['banner' => $bannerPath]);

    // Redirect or respond as needed
    return redirect('/post')->with('success', 'Post created successfully');
}
    }