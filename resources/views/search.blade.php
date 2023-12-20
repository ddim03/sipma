@extends('layouts.main')

@push('styles')
@livewireStyles
@endpush

@push('scripts')
@livewireScripts
@endpush

@if ($keyword != "all")
@section('title')
Hasil Pencarian : {{ $keyword }}
@endsection
@else
@section('title')
Pengumuman Terbaru
@endsection
@endif


@section('content')
<section class="w-full md:w-4/5 px-3 md:px-0 mx-auto max-w-screen-xl mt-24">
    @if ($keyword != "all")
    <h1 class="text-2xl font-bold text-gray-900"> Hasil Pencarian : <span>{{ $keyword }}</span></h1>
    <p class="text-md text-gray-400">Pengumuman berdasarkan hasil pencarian</p>
    @else
    <h1 class="text-2xl font-bold text-gray-900"> Pengumuman Terbaru</span></h1>
    <p class="text-md text-gray-400">Pengumuman yang baru saja dipublikasikan</p>
    @endif
    @livewire('search-data')
</section>
@endsection