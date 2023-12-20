@extends('admin.layouts.main')

@section('title')
Login
@endsection

@section('content')
<section class="min-h-screen bg-gray-50 bg-cover bg-center">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
        <a href="/login" class="flex items-center mb-6 text-lg leading-none font-bold text-gray-900">
            <img class="w-8 h-8 mr-2" src="{{ Vite::asset('resources/img/logo.png') }}" alt="logo">
            SIPMA<br>POLINEMA
        </a>
        <div class="w-full bg-white rounded shadow-sm md:mt-0 sm:max-w-md xl:p-0 border">
            <div class="py-6 px-8 space-y-4 md:space-y-6">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Masuk ke akun anda
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ url('login') }}" method="POST">
                    @csrf
                    <div>
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="username" id="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="username" required value="{{ old('username') }}">
                        @error('username')
                        <p class="mt-2 ml-1 text-sm text-red-600 font-medium flex items-center gap-2">
                            <svg class="w-4 h-4 text-red-600 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Username atau password salah
                        </p>
                        @enderror
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <div
                            class="relative flex items-center bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded w-full">
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 p-2.5 text-gray-900 sm:text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full"
                                required>
                            <button type="button" class="h-full px-3 absolute right-0 flex items-center"
                                id="show-password-btn">
                                <svg class="w-[18px] h-[18px] text-gray-400 dark:text-white" aria-hidden="true"
                                    id="pass-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                                    <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2">
                                        <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                        <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                                    </g>
                                </svg>
                            </button>
                        </div>
                        @error('username')
                        <p class="mt-2 ml-1 text-sm text-red-600 font-medium flex items-center gap-2">
                            <svg class="w-4 h-4 text-red-600 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Username atau password salah
                        </p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded text-sm px-5 py-2.5 text-center flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 18 15">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 7.5h11m0 0L8 3.786M12 7.5l-4 3.714M12 1h3c.53 0 1.04.196 1.414.544.375.348.586.82.586 1.313v9.286c0 .492-.21.965-.586 1.313A2.081 2.081 0 0 1 15 14h-3" />
                        </svg>
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection