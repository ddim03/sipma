@extends('layouts.main')
@section('content')
<section class="min-h-screen bg-[url('../img/hero.jpg')] bg-cover bg-center">
    <div class="w-full h-screen bg-gray-900 bg-opacity-75 flex items-center ">
        <div class="w-11/12 sm:w-4/5 mx-auto">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16" id="search">
                <h1
                    class="mb-4 mt-20 text-3xl sm:text-4xl font-extrabold tracking-tight leading-tight text-white md:text-5xl lg:text-6xl">
                    Sistem Informasi Pengumuman Mahasiswa</h1>
                <p class="mb-8 text-md sm:text-lg font-normal text-gray-50 lg:text-xl sm:px-16 lg:px-48">
                    Platform pengumuman untuk mahasiswa program studi manajemen informatika
                    PSDKU POLINEMA di Kota Kediri</p>
                <div class="w-full md:w-4/5 mx-auto">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Cari judul pengumuman...">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="w-full md:w-4/5 px-3 md:px-0 pt-8 mx-auto max-w-screen-xl">
    <div class="flex justify-between items-end">
        <div class="grub">
            <h2 class="text-2xl font-semibold text-gray-800">Terbaru</h2>
            <p class="text-md text-gray-400">Pengumuman yang baru saja dipublikasikan</p>
        </div>
        <a href="#"
            class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Lihat semua
        </a>
    </div>
    <div class="w-full grid grid-cols-1 lg:grid-cols-2 mt-5 mb-14 gap-3">
        @foreach($posts as $post)
        <a href=""
            class="flex flex-col items-start bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 overflow-hidden">
            <img class="object-cover object-center w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                src="{{ asset('images/'. $post->banner) }}" alt="{{ $post->title }}">
            <div class="flex flex-col justify-between px-4 py-3 leading-normal overflow-hidden">
                <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded mb-2 w-fit">
                    {{ $post->category->nama}}
                </span>
                <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 md:truncate">{{ $post->title }}</h5>
                <div class="text-xs text-slate-500 mb-2">From: {{ $post->admin->nama }}</div>
                <p class="mb-5 font-normal text-gray-700">{{ $post->deskripsi }}</p>
                <div class="flex w-full justify-end text-xs text-slate-500">
                    Published at: {{ $post->published_at->format('l, d F Y') }}
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endsection