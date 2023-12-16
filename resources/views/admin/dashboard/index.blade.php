@extends('admin.layouts.main')

@section('content')
@include('admin.partials.navbar')
@include('admin.partials.sidebar')
<main class="px-0 md:px-4 pt-4 sm:ml-64 bg-gray-50 font-roboto">
    <div class="p-4 mt-12">
        <h3 class="text-3xl font-bold text-slate-800">Overview</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mt-4">
            <div class="flex items-center h-32 px-5 rounded bg-white border border-gray-200 shadow-sm">
                <div class="w-20 h-20 bg-blue-200 mr-5 bg-opacity-90 rounded-md flex justify-center items-center">
                    <svg class="w-8 h-8 text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 19">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m9 12 5.419 3.871A1 1 0 0 0 16 15.057V2.943a1 1 0 0 0-1.581-.814L9 6m0 6V6m0 6H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h7m-5 6h3v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5Zm15-3a3 3 0 0 1-3 3V6a3 3 0 0 1 3 3Z" />
                    </svg>
                </div>
                <div class="flex sm:flex-col items-center gap-3 sm:gap-0 sm:items-start justify-center">
                    <p class="sm:mb-1 text-4xl font-black">10</p>
                    <p class="text-blue-600 leading-tight text-md sm:text-sm">Total<br>pengumuman</p>
                </div>
            </div>
            <div class="flex items-center px-5 h-32 rounded bg-white border border-gray-200 shadow-sm">
                <div class="w-20 h-20 bg-green-200 mr-5 bg-opacity-90 rounded-md flex justify-center items-center">
                    <svg class="w-8 h-8 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 19">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m9 12 5.419 3.871A1 1 0 0 0 16 15.057V2.943a1 1 0 0 0-1.581-.814L9 6m0 6V6m0 6H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h7m-5 6h3v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5Zm15-3a3 3 0 0 1-3 3V6a3 3 0 0 1 3 3Z" />
                    </svg>
                </div>
                <div class="flex sm:flex-col items-center gap-3 sm:gap-0 sm:items-start justify-center">
                    <p class="sm:mb-1 text-4xl font-black">6</p>
                    <p class="text-green-500 leading-tight text-md sm:text-sm">Pengumuman<br> divalidasi</p>
                </div>
            </div>
            <div class="flex items-center px-5 h-32 rounded bg-white border border-gray-200 shadow-sm">
                <div class="w-20 h-20 bg-red-200 mr-5 bg-opacity-90 rounded-md flex justify-center items-center">
                    <svg class="w-8 h-8 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 19">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m9 12 5.419 3.871A1 1 0 0 0 16 15.057V2.943a1 1 0 0 0-1.581-.814L9 6m0 6V6m0 6H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h7m-5 6h3v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5Zm15-3a3 3 0 0 1-3 3V6a3 3 0 0 1 3 3Z" />
                    </svg>
                </div>
                <div class="flex sm:flex-col items-center gap-3 sm:gap-0 sm:items-start justify-center">
                    <p class="sm:mb-1 text-4xl font-black">4</p>
                    <p class="text-red-500 leading-tight text-md sm:text-sm">Pengumuman<br> belum divalidasi</p>
                </div>
            </div>
            <div class="flex items-center px-5 h-32 rounded bg-white border border-gray-200 shadow-sm">
                <div class="w-20 h-20 bg-violet-200 mr-5 bg-opacity-90 rounded flex justify-center items-center">
                    <svg class="w-8 h-8 text-violet-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                            d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z" />
                    </svg>
                </div>

                <div class="flex sm:flex-col items-center gap-3 sm:gap-0 sm:items-start justify-center">
                    <p class="sm:mb-1 text-4xl font-black">6</p>
                    <p class="text-violet-500 leading-tight text-md sm:text-sm">Arsip<br>diupload</p>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4">
        <h3 class="text-2xl font-bold text-slate-800">Semua Pengumuman</h3>
        <div class="mt-4 p-4 rounded bg-white border border-gray-200 shadow-sm">
            <div class="relative h-11 w-full sm:w-1/2">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none w-full">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class=" w-full py-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Cari judul pengumuman">
            </div>
            <div class="overflow-x-auto pt-4 bg-white rounded-b-lg">
                <table class="w-full text-sm text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 text-center">
                        <tr>
                            <th scope="col" class="px-4 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Judul
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategori
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Admin
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Published At
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 text-center">1</td>
                            <td class="px-6 py-4 text-ellipsis">
                                Program Magang Mandiri Telkomsel
                            </td>
                            <td class="px-6 py-4 text-center">
                                Kegiatan Belajar Mengajar
                            </td>
                            <td class="px-6 py-4 text-center">
                                Dimas Gilang Dwi Aji
                            </td>
                            <td class="px-6 py-4 text-center">
                                Senin, 02 November 2023
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="bg-green-50 border border-green-100 text-green-600 text-xs font-medium me-2 px-3 py-1.5 rounded">
                                    Validated
                                </span>
                            </td>
                        </tr>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 text-center">2</td>
                            <td class="px-6 py-4">
                                Lomba PKM POLINEMA PSDKU Kediri
                            </td>
                            <td class="px-6 py-4 text-center">
                                Akademik
                            </td>
                            <td class="px-6 py-4 text-center">
                                Dimas Gilang Dwi Aji
                            </td>
                            <td class="px-6 py-4 text-center">
                                Senin, 02 November 2023
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="bg-red-50 border border-red-100 text-red-600 text-xs font-medium me-2 px-3 py-1.5 rounded">
                                    Waiting
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center bg-white pt-4 rounded-b-lg">
                <nav aria-label="Page navigation example">
                    <ul class="inline-flex -space-x-px text-sm">
                        <li>
                            <a href="#"
                                class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</main>
@include('admin.partials.notification')
@endsection