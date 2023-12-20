<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <title>SIPMA | Sistem Informasi Pengumuman dan Arsip</title>
</head>

<body class="bg-gray-50">
    <header
        class="w-full fixed top-0 left-0 flex justify-center z-50 mx-auto bg-white font-roboto border border-b-gray-200 shadow-sm">
        <div class="w-full lg:w-4/5">
            <nav>
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-4 sm:px-0 py-4">
                    <a href="" class="flex items-center">
                        <img src="{{ Vite::asset('resources/img/logo.png') }}" class="h-8 mr-3" alt="sipma" />
                        <span
                            class="self-center text-lg font-bold whitespace-nowrap leading-none">SIPMA<br>POLINEMA</span>
                    </a>
                    <button data-collapse-toggle="navbar-default" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                        aria-controls="navbar-default" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                    <div class="hidden w-full md:block md:w-auto relative" id="navbar-default">
                        <ul
                            class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
                            <li>
                                <a href="/"
                                    class="block py-2 pl-3 pr-4 {{ Request::is('/') ? 'active' : 'base' }} rounded md:p-0"
                                    aria-current="page">
                                    Beranda
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('categories/akademik') }}"
                                    class="block py-2 pl-3 pr-4 {{ Request::is('categories/akademik') ? 'active' : 'base' }} rounded md:border-0 md:p-0">
                                    Akademik
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('categories/kemahasiswaan') }}"
                                    class="block py-2 pl-3 pr-4 {{ Request::is('categories/kemahasiswaan') ? 'active' : 'base' }} rounded md:border-0 md:p-0">
                                    Kemahasiswaan
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('about') }}"
                                    class="block py-2 pl-3 pr-4 {{ Request::is('about') ? 'active' : 'base' }} rounded md:border-0 md:p-0">
                                    Tentang
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main class="w-full font-roboto bg-gray-50">
        @yield('content')
    </main>
    <a href="https://tamatika-sipma.vercel.app/" target="_blank"
        class="fixed bottom-5 right-5 flex z-10 justify-center items-center w-12 h-12 rounded bg-blue-600 hover:bg-blue-700">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 20 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 5h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-2v3l-4-3H8m4-13H2a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h2v3l4-3h4a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
        </svg>
    </a>
    <footer class="bg-gray-50 m-4 font-roboto">
        <div class="w-full mx-auto max-w-screen-xl p-4 flex items-center justify-center">
            <span class="text-sm text-gray-500 text-center font-bold">© 2023 <a href=""
                    class="hover:underline">SIPMA</a> POLINEMA KEDIRI
            </span>
        </div>
    </footer>
    <script src="{{ asset('js/features.js') }}"></script>
    @stack('scripts')
</body>

</html>