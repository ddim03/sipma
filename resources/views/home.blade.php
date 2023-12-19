@extends('layouts.main')

@push('styles')
@livewireStyles
@endpush

@push('scripts')
@livewireScripts
@endpush

@section('content')
@livewire('home-data')
@endsection