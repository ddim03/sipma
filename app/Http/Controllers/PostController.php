<?php

namespace App\Http\Controllers;

use App\Models\Post; // Pastikan namespace-nya sesuai dengan struktur direktori Anda
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Admin;
use App\Http\Controllers\ArsipController;
use App\Models\Arsip;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;


class PostController extends Controller
{

    public function index(Request $request)
    {
        $query = Post::where('is_validated', 1)
            ->orderBy('published_at', 'desc');
    
        // Check for the 'show_all' query parameter
        $showAll = $request->query('show_all');
    
        // Get all posts if show_all is true, otherwise paginate with 4 posts per page
        $posts = $showAll ? $query->get() : $query->paginate(4);
    
        foreach ($posts as $post) {
            $post->published_at = Carbon::parse($post->published_at)->format('d M Y H:i:s');
        }
    
        return view('home', ['posts' => $posts]);
    }
    


    public function detail($post_id)
    {
        $post = Post::findOrFail($post_id);
        return view('detail', compact('post'));
    }


    public function pengumuman()
    {
        // Mendapatkan admin yang sedang login
        $admin = auth()->user();

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
    ], [
        'banner.*' => 'Sesuaikan format banner seperti ketentuan.',
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
            'deskripsi' => $validatedData['deskripsi'],
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
    $arsipsQuery = Arsip::query();

    // Count the total number of posts
    $totalPosts = Post::count();

    // Count the number of validated posts
    $validatedPosts = Post::where('is_validated', 1)->count();

    // Count the number of posts awaiting validation
    $waitingValidationPosts = Post::where('is_validated', 0)->count();

    // Count the total number of rows in the Arsip table
    $totalArsips = Arsip::count();

    // Get paginated results for posts
    $posts = $postsQuery->paginate(10);

    // Pass the counts, posts, and totalArsips to the view
    return view('admin.dashboard', [
        'totalPosts' => $totalPosts,
        'validatedPosts' => $validatedPosts,
        'waitingValidationPosts' => $waitingValidationPosts,
        'totalArsips' => $totalArsips,
        'posts' => $posts,
    ]);
}

    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'slug' => 'required|string',
            'deskripsi' => 'required|string',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add other fields as needed 
        ], [
            'banner.*' => 'Sesuaikan format banner seperti ketentuan.',
        ]);

        if ($validator->fails()) {
            return redirect('/post/create')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();
        $validatedData['category_id'] = Auth::guard('web')->user()->admin_id;
        $validatedData['admin_id'] = Auth::guard('web')->user()->admin_id;
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

    public function indexkaprodi()
    {
        $posts = Post::where('is_validated', 0)->get();

        return view('admin.validate', compact('posts'));
    }
    public function validatePost($post_id)
    {
        $post = Post::find($post_id);

        if ($post) {
            // Update the is_validated column to 1
            $post->update(['is_validated' => 1]);

            // Send data to Firebase
            $this->sendDataToFirebase($post);

            // Redirect back or to any other page as needed
            return redirect()->back();
        } else {
            // Handle case where post is not found
            return response()->json(['error' => 'Post not found'], 404);
        }
    }

    private function sendDataToFirebase($post)
    {
        // Initialize CURL
        $curl = curl_init();

        // Prepare Firebase URL based on post_id
        $url = "https://fir-1-77b67-default-rtdb.firebaseio.com/TabelPosts/" . $post->post_id . ".json";

        // Retrieve admin name based on admin_id
        $adminName = $this->getAdminName($post->admin_id);

        // Retrieve category name based on category_id
        $categoryName = $this->getCategoryName($post->category_id);

        // Format the date as "Sunday, 10 December 2023"
        $formattedDate = $post->published_at->format('l, j F Y');

        // Prepare data to be sent
        $data = [
            'post_id'       => $post->post_id,
            'category_name' => $categoryName,
            'admin_name'    => $adminName,
            'title'         => $post->title,
            'slug'          => $post->slug,
            'banner'        => $post->banner,
            'deskripsi'     => $post->deskripsi,
            'published_at'  => $formattedDate,
            'is_validated'  => $post->is_validated,
            'created_at'    => $post->created_at,
            'updated_at'    => $post->updated_at
        ];

        $payload = json_encode($data);

        // Set CURL options
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        $out = curl_exec($curl);

        // Close CURL connection
        curl_close($curl);

        // You might want to handle the result or log it as needed
        // For example: Log::info('Data sent to Firebase: ' . $out);
    }


    private function getAdminName($admin_id)
    {
        // Assuming you have an Eloquent model for admins
        $admin = Admin::find($admin_id);

        // Check if admin exists and return their name
        return $admin ? $admin->nama : null;
    }

    private function getCategoryName($category_id)
    {
        // Assuming you have an Eloquent model for categories
        $category = Category::find($category_id);

        // Check if category exists and return its name
        return $category ? $category->name : null;
    }

    public function review($post_id)
    {
        // Find the post based on ID
        $post = Post::find($post_id);

        if (!$post) {
            return redirect()->route('post.index')->with('error', 'Pengumuman tidak ditemukan');
        }

        return view('admin.review', compact('post')); // Adjust the view name if needed
    }

    public function updatereview(Request $request, $post_id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'deskripsi' => 'required|string',
            // Add other validation rules if needed
        ]);

        // Find the post based on ID
        $post = Post::find($post_id);

        if (!$post) {
            return redirect()->route('post.index')->with('error', 'Pengumuman tidak ditemukan');
        }

        // Update the post with the validated data
        $post->update([
            'deskripsi' => $validatedData['deskripsi'],
            // Add other fields if needed
        ]);

        // Redirect or respond as needed
        return redirect('/validate')->with('success', 'Post updated successfully');
    }

    public function liveSearch(Request $request)
{
    if ($request->ajax()) {
        $output = '';
        $query = $request->get('query');

        $posts = Post::where('is_validated', 1)
            ->orderBy('published_at', 'desc')
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('title', 'like', '%' . $query . '%');
            })
            ->when(!$request->filled('show_all'), function ($queryBuilder) {
                return $queryBuilder->paginate(4);
            })
            ->get();
        // Membuat HTML untuk hasil pencarian
        foreach ($posts as $post) {
            $wrappedDescription = substr(strip_tags($post->deskripsi), 0, 100);
            $wrappedDescription .= strlen(strip_tags($post->deskripsi)) > 100 ? '...' : '';

            $output .= "
                <a href='" . route('post.detail', ['id' => $post->post_id]) . "' class='flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 overflow-hidden'>
                    <img class='object-cover object-center w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg' src='" . asset('storage/' . $post->banner) . "' alt='" . $post->title . "'>
                    <div class='flex flex-col justify-between px-4 py-3 leading-normal overflow-hidden'>
                        <span class='bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded mb-2 w-fit'>" . $post->category->name . "</span>
                        <h5 class='mb-1 text-2xl font-bold tracking-tight text-gray-900 md:truncate'>" . $post->title . "</h5>
                        <div class='text-xs text-slate-500 mb-2'>From: " . $post->admin->nama . "</div>
                        <p class='mb-5 font-normal text-gray-700'>
                            " . $wrappedDescription . "
                        </p>
                        <div class='flex w-full justify-end text-xs text-slate-500'>Published at: " . $post->published_at->format('l, d F Y') . "</div>
                    </div>
                </a>
            ";
        }

        $data = [
            'result_html' => $output,
            'total_data'  => $posts->total(),
            'current_page' => $posts->currentPage(),
            'last_page' => $posts->lastPage(),
        ];

        // Tambahkan pesan jika tidak ada hasil pencarian
        if ($posts->isEmpty()) {
            $data['result_html'] = '<p class="text-gray-500 text-lg">Post not found</p>';
        }

        return response()->json($data);
    }
}

}
