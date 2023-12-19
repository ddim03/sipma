@extends('layouts.main')

@push('styles')
@livewireStyles
@endpush

@push('scripts')
@livewireScripts
@endpush

@section('content')
<section class="w-full md:w-4/5 px-3 md:px-0 pt-6 mx-auto max-w-screen-xl mt-20">
    <h1 class="text-xl font-medium">Pencarian : <span>{{ $keyword }}</span></h1>
    @livewire('search-data')
</section>
@endsection