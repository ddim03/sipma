@extends('admin.layouts.main-form')

@section('content')
    @include('admin.partials.navbar')
    @include('admin.partials.sidebar')

    <main class="p-4 sm:ml-64 bg-gray-50 font-roboto min-h-screen">
        <div class="p-0 sm:p-4 mt-14">
            <h1 class="text-3xl font-bold text-slate-800 mt-20 sm:mt-0 mb-1.5">Buat Pengumuman</h1>
            <section class="bg-white dark:bg-gray-900 mt-4 rounded-lg">
                <div class="p-4 sm:p-6">
                    <form action="{{ route('update-post', ['post_id' => $post->post_id]) }}" method="POST" id="editPostForm"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="category_id" value="{{ $post->category_id ?? '' }}">
                        <input type="hidden" name="admin_id" value="{{ $post->admin_id ?? '' }}">

                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="w-full">
                                <label for="judul" class="block mb-2 font-medium text-gray-900 dark:text-white">
                                    Judul
                                </label>
                                <input type="text" name="judul" id="judul" value="{{ $post->title ?? '' }}" 

                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukan judul pengumuman" required autocomplete="false">
                            </div>
                            <div class="w-full">
                                <label for="slug" class="block mb-2 font-medium text-gray-900 dark:text-white">
                                    Slug
                                </label>
                                <input type="text" name="slug" id="slug" value="{{ $post->slug ?? '' }}"  readonly 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required="" autocomplete="false">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="deskripsi" class="block mb-2 font-medium text-gray-900 dark:text-white">
                                    Isi Pengumuman
                                </label>
                                <textarea name="deskripsi" id="deskripsi"
                                    class="w-full">{{ $post->deskripsi ?? '' }}</textarea>
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block mb-2 font-medium text-gray-900" for="banner">
                                    Upload Gambar
                                </label>
                                <div
                                    class="flex flex-col-reverse sm:flex-row gap-4 items-center justify-center w-full relative">
                                    <label for="banner"
                                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"
                                                id="file_input_help">
                                                <span class="font-semibold">Click to upload</span>
                                                or drag and drop
                                            </p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400" id="file_input_type">
                                                SVG, PNG, JPG (MAX. 2MB)
                                            </p>
                                        </div>
                                        <input id="banner" type="file"
                                            class="w-full h-full opacity-0 absolute top-0 left-0 cursor-pointer"
                                            name="banner" />
                                    </label>
                                    <img src="{{ Storage::url('/' . $post->banner) }}" class="w-48 h-auto" alt="">
                                </div>
                                @if($errors->has('banner'))
                                    <p class="text-l text-red-500 mt-1">{{ $errors->first('banner') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <button type="submit" id="simpanButton"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Simpan
                            </button>
                            <a href="{{ url('/post/') }}"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-gray-800 border border-gray-200 rounded-lg">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editPostForm = document.getElementById('editPostForm');
        const simpanButton = document.getElementById('simpanButton');

        editPostForm.addEventListener('submit', function (event) {
            event.preventDefault();

           
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Pengumuman akan ditambahkan.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    simpanButton.disabled = true;
                    editPostForm.submit();
                }
            });
        });
    });
</script>
@endsection