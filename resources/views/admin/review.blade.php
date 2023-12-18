@extends('admin.layouts.main-form')

@section('content')
@include('admin.partials.navbar')
@include('admin.partials.sidebar')
<main class="p-4 sm:ml-64 bg-gray-50 font-roboto min-h-screen">
    <div class="p-0 sm:p-4 mt-14">
        <h1 class="text-3xl font-bold text-slate-800 mt-20 sm:mt-0 mb-4">Detail Pengumuman</h1>
        <div class="p-5 bg-white flex flex-col j sm:flex-row rounded border border-gray-200">
        <form action="{{ route('update-review', ['post_id' => $post->post_id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 w-4/5">
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Judul</h2>
                    <p class="text-sm text-slate-700">{{ $post->title ?? '' }}
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Slug</h2>
                    <p class="text-sm text-slate-700">
                    {{ $post->slug ?? '' }}
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Admin</h2>
                    <p class="text-sm text-slate-700">
                    {{ $post->admin->nama }}
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Kategori</h2>
                    <p class="text-sm text-slate-700">
                    {{ $post->category->name }}
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Published At</h2>
                    <p class="text-sm text-slate-700">
                    {{ $post->published_at->format('l, d F Y') }}
                    </p>
                </div>
            </div>
            <div class="mt-4 sm:mt-0 mx-auto">
                <img src="{{ Storage::url('/' . $post->banner) }}" alt="{{ $post->title }}" class="w-36 aspect-auto" alt="">
            </div>
        </div>

    </div>
    <div class="p-0 sm:p-4">
        <div class="p-5 bg-white rounded border border-gray-200">
            <h1 class="text-md font-medium text-slate-700 mb-2">Isi Pengumuman</h1>
            <hr>
            <div class="mt-4">
                <textarea id="deskripsi" name="deskripsi" class="w-full">{{ $post->deskripsi ?? '' }}</textarea>
            </div>
        </div>
    </div>
    <div class="pl-4 mt-2">
    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
        Simpan
    </button>
    </form>
</main>
@endsection