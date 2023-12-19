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
<main class="px-0 md:px-4 pt-4 sm:ml-64 bg-gray-50 font-roboto">
    <div class="p-4 mt-12">
        <h3 class="text-3xl font-bold text-slate-800">Overview</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mt-4">
            <div class="flex items-center h-32 px-5 rounded bg-white border border-gray-200 shadow-sm">
                <div class="w-20 h-20 bg-blue-200 mr-5 bg-opacity-90 rounded-md flex justify-center items-center">
                    <svg class="w-8 h-8 text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 19">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m9 12 5.419 3.871A1 1 0 0 0 16 15.057V2.943a1 1 0 0 0-1.581-.814L9 6m0 6V6m0 6H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h7m-5 6h3v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5Zm15-3a3 3 0 0 1-3 3V6a3 3 0 0 1 3 3Z" />
                    </svg>
                </div>
                <div class="flex sm:flex-col items-center gap-3 sm:gap-0 sm:items-start justify-center">
                    <p class="sm:mb-1 text-4xl font-black">{{ $total }}</p>
                    <p class="text-blue-600 leading-tight text-md sm:text-sm">Total<br>pengumuman</p>
                </div>
            </div>
            <div class="flex items-center px-5 h-32 rounded bg-white border border-gray-200 shadow-sm">
                <div class="w-20 h-20 bg-green-200 mr-5 bg-opacity-90 rounded-md flex justify-center items-center">
                    <svg class="w-8 h-8 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 19">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m9 12 5.419 3.871A1 1 0 0 0 16 15.057V2.943a1 1 0 0 0-1.581-.814L9 6m0 6V6m0 6H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h7m-5 6h3v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5Zm15-3a3 3 0 0 1-3 3V6a3 3 0 0 1 3 3Z" />
                    </svg>
                </div>
                <div class="flex sm:flex-col items-center gap-3 sm:gap-0 sm:items-start justify-center">
                    <p class="sm:mb-1 text-4xl font-black">{{ $validated }}</p>
                    <p class="text-green-500 leading-tight text-md sm:text-sm">Pengumuman<br> divalidasi</p>
                </div>
            </div>
            <div class="flex items-center px-5 h-32 rounded bg-white border border-gray-200 shadow-sm">
                <div class="w-20 h-20 bg-red-200 mr-5 bg-opacity-90 rounded-md flex justify-center items-center">
                    <svg class="w-8 h-8 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 19">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m9 12 5.419 3.871A1 1 0 0 0 16 15.057V2.943a1 1 0 0 0-1.581-.814L9 6m0 6V6m0 6H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h7m-5 6h3v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5Zm15-3a3 3 0 0 1-3 3V6a3 3 0 0 1 3 3Z" />
                    </svg>
                </div>
                <div class="flex sm:flex-col items-center gap-3 sm:gap-0 sm:items-start justify-center">
                    <p class="sm:mb-1 text-4xl font-black">{{ $waiting }}</p>
                    <p class="text-red-500 leading-tight text-md sm:text-sm">Pengumuman<br> belum divalidasi</p>
                </div>
            </div>
            <div class="flex items-center px-5 h-32 rounded bg-white border border-gray-200 shadow-sm">
                <div class="w-20 h-20 bg-violet-200 mr-5 bg-opacity-90 rounded flex justify-center items-center">
                    <svg class="w-8 h-8 text-violet-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                            d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z" />
                    </svg>
                </div>

                <div class="flex sm:flex-col items-center gap-3 sm:gap-0 sm:items-start justify-center">
                    <p class="sm:mb-1 text-4xl font-black">{{ $arsips }}</p>
                    <p class="text-violet-500 leading-tight text-md sm:text-sm">Arsip<br>diupload</p>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4">
        <h3 class="text-2xl font-bold text-slate-800">Semua Pengumuman</h3>
        @livewire('dashboard-table')
    </div>
</main>
@include('admin.partials.notification')
@endsection