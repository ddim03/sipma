@extends('admin.layouts.main')

@push('style')
@livewireStyles
@endpush

@push('scripts')
@livewireScripts
@endpush

@section('content')
@include('admin.partials.navbar')
@include('admin.partials.sidebar')
<main class="px-4 py-2 sm:ml-64 bg-gray-50 font-roboto min-h-screen">
    <div class="p-0 sm:p-4 mt-14">
        <h3 class="text-3xl font-bold text-slate-800 mt-20 sm:mt-0 mb-1.5">Pengumuman</h3>
        <span class="block mb-4 text-sm text-gray-500">Halaman untuk mengelola data pengumuman</span>
        @livewire('posts-table')
    </div>
</main>
<div id="popup-modal"
    class="
     overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[9999] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full hidden">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded shadow">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500">
                    Apakah anda yakin ingin menghapus pengumuman ini?
                </h3>
                <form action="" method="post" id="submit-data" class="inline">
                    @method('DELETE')
                    @csrf
                    <button data-modal-hide="popup-modal" type="submit"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                        Hapus
                    </button>
                </form>
                <button data-modal-hide="popup-modal" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
            </div>
        </div>
    </div>
</div>
@include('admin.partials.notification')
@include('admin.partials.flash')
@endsection