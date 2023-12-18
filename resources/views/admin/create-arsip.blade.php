@extends('admin.layouts.main')

@section('content')
@include('admin.partials.navbar')
@include('admin.partials.sidebar')
<main class="p-4 sm:ml-64 bg-gray-50 font-roboto min-h-screen">
    <div class="p-0 sm:p-4 mt-14">
        <h1 class="text-3xl font-bold text-slate-800 mt-20 sm:mt-0 mb-1.5">Tambah Arsip</h3>
        <section class="bg-white mt-4 rounded border">
            <div class=" p-4 sm:p-6 ">
                <form action="{{ route('arsip.store') }}" method="post" id="createPostForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="category_id" value="">
                    <div class="w-full mb-4">
                        <label for="judul" class="block mb-2 font-medium text-gray-900">
                            Nama Arsip <span class="text-red-600">*</span>
                        </label>
                        <input type="text" name="nama" id="nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Masukan nama arsip" required autocomplete="false">
                        <!-- <p class="mt-2 ml-1 text-sm text-red-600 font-medium flex items-center gap-2">
                            <svg class="w-4 h-4 text-red-600 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Invalid input
                        </p> -->
                    </div>
                    <div class="w-full mb-4">
                        <label for="deskripsi" class="block mb-2 font-medium text-gray-900">
                            Deskripsi Arsip <span class="text-red-600">*</span>
                        </label>
                        <textarea id="deskripsi" name="deskripsi" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700"
                            placeholder="Tulis deskripsi arsip"></textarea>
                        <!-- <p class="mt-2 ml-1 text-sm text-red-600 font-medium flex items-center gap-2">
                            <svg class="w-4 h-4 text-red-600 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Invalid input
                        </p> -->
                    </div>
                    <div class="w-full">
                        <label class="block mb-2 font-medium text-gray-900" for="pdf">
                            Upload File <span class="text-red-600">*</span>
                        </label>
                        <div class="flex items-center justify-center w-full relative">
                            <label for="pdf"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500" id="uploadedFileName">
                                        <span class="font-bold">Click to upload</span>
                                        or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500" id="uploadedFileName">
                                        PDF (MAX. 5MB)
                                    </p>
                                </div>
                                <input id="pdf" type="file"
                                    class="w-full h-full opacity-0 absolute top-0 left-0 cursor-pointer"
                                    name="pdf" />
                            </label>
                        </div>
                    </div>
                    <div class="flex gap-3 mt-4 sm:mt-6">
                        <button type="submit" id="simpanButton"
                            class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                            Simpan
                        </button>
                        <a href="/arsip/index"
                            class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-gray-800 border border-gray-200 rounded">
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
        const fileInput = document.getElementById('pdf');
        const fileNameContainer = document.getElementById('uploadedFileName');

        fileInput.addEventListener('change', function () {
            if (fileInput.files.length > 0) {
                fileNameContainer.innerText = fileInput.files[0].name;
            } else {
                fileNameContainer.innerText = 'Click to upload';
            }
        });

        const createPostForm = document.getElementById('createPostForm');
        const simpanButton = document.getElementById('simpanButton');

        createPostForm.addEventListener('submit', function (event) {
            event.preventDefault();

            // Reset previous error messages
            const errorMessages = document.querySelectorAll('.error-message');
            errorMessages.forEach(message => message.remove());

            // Validate form fields
            let isValid = true;

            const namaInput = document.getElementById('nama');
            const deskripsiInput = document.getElementById('deskripsi');

            if (!namaInput.value.trim()) {
                isValid = false;
                displayErrorMessage(namaInput, 'Nama Arsip harus diisi');
            }

            if (!deskripsiInput.value.trim()) {
                isValid = false;
                displayErrorMessage(deskripsiInput, 'Deskripsi Arsip harus diisi');
            }

            const allowedExtensions = /(\.pdf)$/i;
            const uploadedFile = fileInput.files[0];

            if (!uploadedFile || !allowedExtensions.exec(uploadedFile.name)) {
                isValid = false;
                displayErrorMessage(fileInput, 'File harus berformat PDF');
            }

            if (isValid) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Arsip akan ditambahkan.',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Simpan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        simpanButton.disabled = true;
                        createPostForm.submit();

                        Swal.fire(
                            'Arsip Ditambahkan!',
                            'Arsip Anda berhasil ditambahkan.',
                            'success'
                        );
                    }
                });
            }
        });

        function displayErrorMessage(inputElement, message) {
            const errorMessage = document.createElement('p');
            errorMessage.className = 'mt-2 ml-1 text-sm text-red-600 font-medium error-message';
            errorMessage.innerHTML = `
                <svg class="w-4 h-4 text-red-600 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                ${message}
            `;
            inputElement.parentNode.appendChild(errorMessage);
        }
    });
</script>
@endsection
