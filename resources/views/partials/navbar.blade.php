<header class="w-full fixed top-0 left-0 flex justify-center z-50 mx-auto bg-white font-roboto">
    <div class="w-full lg:w-4/5">
        <nav>
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="" class="flex items-center">
                    <img src="{{ Vite::asset('resources/img/logo.png') }}" class="h-8 mr-3" alt="sipma" />
                    <span
                        class="self-center text-lg font-semibold whitespace-nowrap leading-none">SIPMA<br>POLINEMA</span>
                </a>
                <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
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
                            <a href="#" class="block py-2 pl-3 pr-4 standart rounded md:p-0"
                                aria-current="page">Beranda</a>
                        </li>
                        <li>
                            <a href="#search"
                                class="block py-2 pl-3 pr-4 active rounded md:border-0 md:p-0">Akademik</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 standart rounded md:border-0 md:p-0">KBM</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 standart rounded md:border-0 md:p-0">Kemahasiswaan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>