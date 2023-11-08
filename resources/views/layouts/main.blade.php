@php
use Illuminate\Support\Facades\Vite;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>SIPMA | Sistem Informasi Pengumuman dan Arsip</title>
</head>

<body>
    <main class="w-full font-roboto">
        @yield('content')
    </main>
    <a href=""
        class="fixed bottom-5 right-5 flex justify-center items-center w-12 h-12 rounded-md bg-blue-600 hover:bg-blue-700">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 20 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 5h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-2v3l-4-3H8m4-13H2a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h2v3l4-3h4a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
        </svg>
    </a>
    <footer class="bg-white m-4 font-roboto">
        <div class="w-full mx-auto max-w-screen-xl p-4 flex items-center justify-center">
            <span class="text-sm text-gray-500 text-center font-semibold">© 2023 <a href=""
                    class="hover:underline">SIPMA</a> POLINEMA KEDIRI
            </span>
        </div>
    </footer>
    @vite('resources/js/features.js')
</body>

</html>