@extends('admin.layouts.main-form')

@section('title')
Buat Pengumuman
@endsection


@section('content')
@include('admin.partials.navbar')
@include('admin.partials.sidebar')
<main class="p-4 sm:ml-64 bg-gray-50 font-roboto min-h-screen">
    <div class="p-0 sm:p-4 mt-14">
        <h1 class="text-3xl font-bold text-slate-800 mt-20 sm:mt-0 mb-1.5">Buat Pengumuman</h1>
        <section class="bg-white mt-4 rounded border">
            <div class=" p-4 sm:p-6">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="w-full">
                            <label for="judul" class="block mb-2 font-medium text-gray-900">
                                Judul Pengumuman <span class="text-red-600">*</span>
                            </label>
                            <input type="text" name="judul" id="judul"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Masukan judul pengumuman" required autocomplete="false"
                                value="{{ old('judul') }}">
                            @error('slug')
                            <p class="mt-2 ml-1 text-sm text-red-600 font-medium flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-600 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Invalid input
                            </p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="slug" class="block mb-2 font-medium text-gray-900">
                                Slug Pengumuman <span class="text-red-600">*</span>
                            </label>
                            <input type="text" name="slug" id="slug"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                required autocomplete="false" readonly value="{{ old('slug') }}">
                            @error('slug')
                            <p class=" mt-2 ml-1 text-sm text-red-600 font-medium flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-600 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Invalid input
                            </p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="isi" class="block mb-2 font-medium text-gray-900">
                                Isi Pengumuman <span class="text-red-600">*</span>
                            </label>
                            <textarea id="isi" name="isi"
                                class="w-full">{{ old('isi') ? old('isi') : '<h4>Hello world!!</h4>' }}</textarea>
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block mb-2 font-medium text-gray-900" for="gambar">
                                Upload Gambar <span class="text-red-600">*</span>
                            </label>
                            <div class="flex items-center justify-center w-full relative">
                                <label for="gambar"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded cursor-pointer bg-gray-50 hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500" id="file_input_help">
                                            <span class="font-bold">Click to upload</span>
                                            or drag and drop
                                        </p>
                                        <p class="text-xs text-gray-500" id="file_input_type">
                                            SVG, PNG, JPG (MAX. 2MB)
                                        </p>
                                        @error('gambar')
                                        <p class="mt-2 ml-1 text-sm text-red-600 font-medium flex items-center gap-2">
                                            <svg class="w-4 h-4 text-red-600 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            Invalid input
                                        </p>
                                        @enderror
                                    </div>
                                    <input id="gambar" type="file"
                                        class="w-full h-full opacity-0 absolute top-0 left-0 cursor-pointer"
                                        name="gambar" />
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="flex gap-3 mt-4 sm:mt-6">
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                            Simpan
                        </button>
                        <a href="/post"
                            class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-gray-800 border border-gray-200 rounded">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </section>
    </div>
</main>
@endsection