@extends('admin.layouts.main')

@section('content')
    <!-- Masukkan script SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <section class="min-h-screen bg-gray-50 bg-cover bg-center">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-lg leading-none font-semibold text-gray-900">
                <img class="w-8 h-8 mr-2" src="{{ Vite::asset('resources/img/logo.png') }}" alt="logo">
                SIPMA<br>POLINEMA
            </a>
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Masuk ke akun Anda
                    </h1>
                    @if (auth('admin')->check())
                        <!-- Konten form login -->
                        <form class="space-y-4 md:space-y-6" action="{{ route('admin.login') }}" method="POST">
                            @csrf
                            <div>
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username" required="">
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login</button>
                        </form>
                    @else
                        <!-- Peringatan jika belum login -->
                        <p class="text-red-500">Anda harus login untuk mengakses halaman ini.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- SweetAlert scripts for success and error messages -->
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Anda Berhasil Masuk',
                        text: '{{ session('success') }}',
                    });
                });
            </script>
        @endif

        @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Username dan Password Anda Salah!',
                        text: '{{ $errors->first() }}',
                    });
                });
            </script>
        @endif
    </section>
@endsection
