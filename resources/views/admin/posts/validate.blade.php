@extends('admin.layouts.main')

@push('styles')
@livewireStyles
@endpush

@push('scripts')
@livewireScripts
@endpush

@section('title')
Validasi Pengumuman
@endsection


@section('content')
@include('admin.partials.navbar')
@include('admin.partials.sidebar')
<main class="px-4 py-2 sm:ml-64 bg-gray-50 font-roboto min-h-screen">
    <div class="p-0 sm:p-4 mt-14">
        <h3 class="text-3xl font-bold text-slate-800 mt-20 sm:mt-0 mb-1.5">Pengumuman</h3>
        <span class="block mb-4 text-sm text-gray-500">Halaman untuk mengelola data pengumuman</span>
        @livewire('validate-post')
    </div>
</main>
@include('admin.partials.notification')
@include('admin.partials.flash')
@endsection