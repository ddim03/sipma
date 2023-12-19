@extends('admin.layouts.main-form')

@section('content')
@include('admin.partials.navbar')
@include('admin.partials.sidebar')
<main class="p-4 sm:ml-64 bg-gray-50 font-roboto min-h-screen">
    <div class="p-0 sm:p-4 mt-14">
        <h1 class="text-3xl font-bold text-slate-800 mt-20 sm:mt-0 mb-1.5">Tambah Arsip</h3>
            <section class="bg-white mt-4 rounded border">
                <div class=" p-4 sm:p-6 ">
                    <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="w-full mb-4">
                            <label for="nama" class="block mb-2 font-medium text-gray-900">
                                Nama Arsip <span class="text-red-600">*</span>
                            </label>
                            <input type="text" name="nama" id="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Masukan nama arsip" required autocomplete="false"
                                value="{{ old('nama') }}">
                            @error('nama')
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
                        <div class="w-full mb-4">
                            <label for="deskripsi" class="block mb-2 font-medium text-gray-900">
                                Deskripsi Arsip <span class="text-red-600">*</span>
                            </label>
                            <textarea id="deskripsi" rows="4" name="deskripsi"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700"
                                placeholder="Tulis deskripsi arsip">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
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
                            <label class="block mb-2 font-medium text-gray-900" for="banner">
                                Upload File <span class="text-red-600">*</span>
                            </label>
                            <div class="flex items-center justify-center w-full relative">
                                <label for="Nama_file"
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
                                            PDF (MAX. 5MB)
                                        </p>
                                        @error('nama_file')
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
                                    <input id="nama_file" type="file"
                                        class="w-full h-full opacity-0 absolute top-0 left-0 cursor-pointer"
                                        name="nama_file" />
                                </label>
                            </div>
                        </div>
                        <div class="flex gap-3 mt-4 sm:mt-6">
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                                Simpan
                            </button>
                            <a href="/arsip"
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