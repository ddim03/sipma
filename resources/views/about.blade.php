@extends('layouts.main')

@section('title')
Tentang
@endsection

@section('content')
<section class="min-h-screen bg-[url('../img/hero.jpg')] bg-cover bg-center">
    <div class="w-full min-h-screen bg-gray-950 bg-opacity-60 flex items-center ">
        <div class="w-11/12 sm:w-4/5 mx-auto">
            <div class="py-8 px-4 w-full lg:py-16 text-center md:text-start mt-32">
                <h1 class="text-4xl font-bold text-white mb-2">
                    Sistem Informasi Pengumuman Mahasiswa dan Arsip
                </h1>
                <p class="text-white font-medium text-lg text-justify">
                    SIPMA adalah aplikasi inovatif yang dirancang khusus untuk membantu mahasiswa dan lembaga pendidikan
                    dalam mengelola pengumuman dan arsip dengan lebih efisien. Kami memahami betapa pentingnya informasi
                    yang akurat dan mudah diakses dalam lingkungan akademis, itulah sebabnya SIPMA hadir untuk memenuhi
                    kebutuhan tersebut.
                </p>
                <h1 class="text-2xl font-bold text-white mt-12 mb-2">
                    Tujuan SIPMA :
                </h1>
                <p class="text-white font-medium text-lg text-justify">
                    SIPMA bertujuan untuk menyederhanakan proses pengelolaan pengumuman, memastikan informasi selalu
                    terkini, dan memberikan akses mudah terhadap arsip-arsip penting. Kami berharap SIPMA dapat menjadi
                    solusi yang efektif dan efisien untuk kebutuhan informasi di lingkungan kampus, sehingga setiap
                    mahasiswa dapat fokus pada pengembangan diri dan pencapaian akademis mereka.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection