@extends('layouts.main')

@push('styles')
@livewireStyles
@endpush

@push('scripts')
@livewireScripts
@endpush

@section('title')
Sistem Informasi Pengumuman Mahasiswa dan Arsip
@endsection

@section('content')
@livewire('home-data')
@endsection