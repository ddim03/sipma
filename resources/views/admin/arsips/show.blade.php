@extends('admin.layouts.main')

@section('title')
Detail Arsip
@endsection


@section('content')
@include('admin.partials.navbar')
@include('admin.partials.sidebar')
<main class="p-4 sm:ml-64 bg-gray-50 font-roboto min-h-screen">
    <div class="p-0 sm:p-4 mt-14">
        <h1 class="text-3xl font-bold text-slate-800 mt-20 sm:mt-0 mb-1.5">Detail Arsip</h1>
        <section class="mt-4 flex flex-col-reverse md:flex-row gap-2">
            <div class="bg-white p-4 sm:p-6 rounded border w-full md:w-1/2 flex flex-col justify-around">
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Nama</h2>
                    <p class="text-sm text-slate-700">
                        {{ $arsip->nama }}
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Deskripsi</h2>
                    <p class="text-sm text-slate-700 text-justify">
                        {{$arsip->deskripsi}}
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Admin</h2>
                    <p class="text-sm text-slate-700">
                        {{ $arsip->admin->nama }}
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Uploaded At</h2>
                    <p class="text-sm text-slate-700">
                        {{ $arsip->created_at->format('l, d F Y') }}
                    </p>
                </div>
            </div>
            <div class="bg-white p-4 sm:p-6 rounded border w-full md:w-1/2">
                <label for="judul" class="block mb-2 font-medium text-gray-900">
                    Preview File
                </label>
                <div class="w-full">
                    <embed src="{{ asset('storage/'.$arsip->nama_file) }}" type="" class="w-full h-[400px]">
                </div>
            </div>
        </section>
    </div>
    <div class="pl-4">
        <a href="/arsip" type="submit"
            class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
            Kembali
        </a>
    </div>
</main>
@endsection