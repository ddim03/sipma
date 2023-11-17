@php
use Illuminate\Support\Facades\Vite;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>SIPMA | Sistem Informasi Pengumuman dan Arsip</title>
</head>

<body>
    <header class="w-full fixed top-0 left-0 flex justify-center z-50 mx-auto bg-white font-roboto">
        <div class="w-full lg:w-4/5">
            <nav>
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a href="" class="flex items-center">
                        <img src="{{ Vite::asset('resources/img/logo.png') }}" class="h-8 mr-3" alt="sipma" />
                        <span
                            class="self-center text-lg font-semibold whitespace-nowrap leading-none">SIPMA<br>POLINEMA</span>
                    </a>
                    <button data-collapse-toggle="navbar-default" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                        aria-controls="navbar-default" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                    <div class="hidden w-full md:block md:w-auto relative" id="navbar-default">
                        <ul
                            class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
                            <li>
                                <a href="#"
                                    class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-600 md:p-0"
                                    aria-current="page">Beranda</a>
                            </li>
                            <li>
                                <a href="#search"
                                    class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Akademik</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">KBM</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Kemahasiswaan</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main class="w-full font-roboto">
        <section class="min-h-screen bg-[url('../img/hero.jpg')] bg-cover bg-center">
            <div class="w-full h-screen bg-gray-900 bg-opacity-75 flex items-center ">
                <div class="w-11/12 sm:w-4/5 mx-auto">
                    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16" id="search">
                        <h1
                            class="mb-4 mt-20 text-3xl sm:text-4xl font-extrabold tracking-tight leading-tight text-white md:text-5xl lg:text-6xl">
                            Sistem Informasi Pengumuman Mahasiswa</h1>
                        <p class="mb-8 text-md sm:text-lg font-normal text-gray-50 lg:text-xl sm:px-16 lg:px-48">
                            Platform pengumuman untuk mahasiswa jurusan Manajemen Informatika
                            PSDKU POLINEMA di Kota Kediri</p>
                        <div class="w-full md:w-4/5 mx-auto">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
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
                    class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">Lihat
                    semua</a>
            </div>
            <div class="w-full grid grid-cols-1 lg:grid-cols-2 mt-5 mb-14 gap-3">
            @foreach($posts as $post)
                <a href="" 
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 overflow-hidden">
                    <img class="object-cover object-center w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('images/'. $post->banner) }}" alt="{{ $post->title }}">
                    <div class="flex flex-col justify-between px-4 py-3 leading-normal overflow-hidden">
                        <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded mb-2 w-fit">{{ $post->category->name}}</span>
                        <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 md:truncate">{{ $post->title }}</h5>
                        <div class="text-xs text-slate-500 mb-2">From: {{ $post->admin->nama }}</div>
                        <p class="mb-5 font-normal text-gray-700">{{ $post->deskripsi }}</p>
                        <div class="flex w-full justify-end text-xs text-slate-500">Published at: {{ $post->published_at->format('l, d F Y') }}</div>
                    </div>
                </a>
              
                @endforeach
            </div>
        </section>
    </main>
    <a href=""
        class="fixed bottom-5 right-5 flex justify-center items-center w-12 h-12 rounded-md bg-blue-600 hover:bg-blue-700">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 20 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 5h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-2v3l-4-3H8m4-13H2a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h2v3l4-3h4a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
        </svg>
    </a>
    <footer class="bg-white m-4 font-roboto">
        <div class="w-full mx-auto max-w-screen-xl p-4 flex items-center justify-center">
            <span class="text-sm text-gray-500 text-center font-semibold">© 2023 <a href=""
                    class="hover:underline">SIPMA</a> POLINEMA KEDIRI
            </span>
        </div>
    </footer>
    @vite('resources/js/features.js')
</body>

</html>