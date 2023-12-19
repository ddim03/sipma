@extends('admin.layouts.main')

@section('content')
@include('admin.partials.navbar')
@include('admin.partials.sidebar')
<main class="p-4 sm:ml-64 bg-gray-50 font-roboto min-h-screen">
    <div class="p-0 sm:p-4 mt-14">
        <h1 class="text-3xl font-bold text-slate-800 mt-20 sm:mt-0 mb-4">Detail Pengumuman</h1>
        <div class="p-5 bg-white flex flex-col j sm:flex-row rounded border border-gray-200">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 w-4/5">
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Judul</h2>
                    <p class="text-sm text-slate-700">
                        {{ $post->judul }}
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Slug</h2>
                    <p class="text-sm text-slate-700">
                        {{ $post->slug }}
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
                        {{ $post->category->nama }}
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Status</h2>
                    <p class="text-sm text-slate-700">
                        @if ($post->is_validated == 1)
                        <span
                            class="bg-green-50 border border-green-100 text-green-600 text-xs font-medium me-2 px-3 py-1.5 rounded">
                            Validated
                        </span>
                        @else
                        <span
                            class="bg-red-50 border border-red-100 text-red-600 text-xs font-medium me-2 px-3 py-1.5 rounded">
                            Waiting
                        </span>
                        @endif
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Created At</h2>
                    <p class="text-sm text-slate-700">
                        {{ $post->created_at->format('l, d F Y') }}
                    </p>
                </div>
            </div>
            <div class="mt-4 sm:mt-0 mx-auto">
                <img src="{{ asset('storage/'.$post->gambar) }}" class="w-36 aspect-auto" alt="{{ $post->judul }}">
            </div>
        </div>
    </div>
    <div class="p-0 sm:p-4">
        <div class="p-5 bg-white rounded border border-gray-200">
            <h1 class="text-md font-medium text-slate-700 mb-2">Isi Pengumuman</h1>
            <hr>
            <div class="mt-4">
                {!! $post->isi !!}
            </div>
        </div>
    </div>
    <div class="pl-4 mt-2">
        <a href="/post" type="submit"
            class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
            Kembali
        </a>
    </div>
</main>
@endsection