@extends('layouts.main')

@push('styles')
@livewireStyles
@endpush

@push('scripts')
@livewireScripts
@endpush

@section('content')
<section class="h-80 md:h-96 bg-[url('../img/hero.jpg')] bg-cover bg-center">
    <div class="w-full h-80 md:h-96 bg-gray-950 bg-opacity-60 flex items-center ">
        <div class="w-11/12 sm:w-4/5 mx-auto">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16" id="search">
                <h1
                    class="mb-6 mt-20 text-3xl sm:text-4xl font-extrabold tracking-tight leading-tight text-white md:text-5xl lg:text-6xl">
                    Pengumuman {{ $title }}</h1>
                <p class="mb-8 text-md sm:text-lg font-normal text-gray-50 lg:text-xl sm:px-16 lg:px-48">
                    Pengumuman tentang kegiatan {{ Str::lower($title) }} mahasiswa program studi manajemen informatika
                </p>
            </div>
        </div>
    </div>
</section>
<section class="w-full md:w-4/5 px-3 md:px-0 pt-6 mx-auto max-w-screen-xl">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    Beranda
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ url('/categories/'.Str::lower($title))}}"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                        {{ $title }}
                    </a>
                </div>
            </li>
        </ol>
    </nav>
    @if (Request::is('categories/akademik'))
    @livewire('akademik-data')
    @else
    @livewire('kemahasiswaan-data')
    @endif
</section>
@endsection