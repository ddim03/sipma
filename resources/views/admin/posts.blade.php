@extends('admin.layouts.main')

@section('content')
@include('admin.partials.navbar')
@include('admin.partials.sidebar')
<main class="p-4 sm:ml-64 bg-gray-50 font-roboto min-h-screen">
    <div class="p-0 sm:p-4 mt-14">
        <h3 class="text-3xl font-bold text-slate-800 mt-20 sm:mt-0 mb-1.5">Pengumuman</h3>
        <span class="block mb-4 text-sm text-gray-500">Halaman untuk mengelola data pengumuman</span>
        <div class="p-4 bg-white flex justify-between rounded-t-lg border-t border-r border-l border-gray-200">
            <div class="relative h-11 w-1/2">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none w-full">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class=" w-full py-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Cari judul pengumuman">
            </div>
            <a href="/post/create" type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 focus:outline-none flex justify-center items-center">
                <svg class="w-4 h-4 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Tambah
            </a>
        </div>
        <div class="overflow-x-auto px-4 py-4 bg-white border-l border-r border-gray-200">
            <table class="w-full text-sm text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 text-center">
                    <tr>
                        <th scope="col" class="px-4 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Judul
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Banner
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Published At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-center">1</td>
                        <td class="px-6 py-4 text-ellipsis">
                            Program Magang Mandiri Telkomsel
                        </td>
                        <td class="px-6 py-4 text-justify">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam vitae accusantium
                            doloribus aliquam laudantium quae soluta at delectus.
                        </td>
                        <td class="px-6 py-4 text-center">
                            <img src="https://dummyimage.com/300x400" alt="" class="w-20 h-auto">
                        </td>
                        <td class="px-6 py-4 text-center">
                            Senin, 02 November 2023
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span
                                class="bg-green-50 border border-green-100 text-green-600 text-xs font-medium me-2 px-3 py-1.5 rounded-md">
                                Validated
                            </span>
                        </td>
                        <td class="px-3 py-4">
                            <div class="flex flex-col sm:flex-row gap-1 justify-center items-center">
                                <a href="/post/view" type="button"
                                    class="px-3 py-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <svg class="w-5 h-5 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                                        <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2">
                                            <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                                        </g>
                                    </svg>
                                </a>
                                <a href="/post/edit" type="button"
                                    class="px-3 py-2 text-sm font-medium text-center text-white bg-yellow-300 rounded-lg hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <svg class="w-5 h-5 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                    </svg>
                                </a>
                                <a href="/post/delete" type="button"
                                    class="px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <svg class="w-5 h-5 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-center">2</td>
                        <td class="px-6 py-4">
                            Lomba PKM POLINEMA PSDKU Kediri
                        </td>
                        <td class="px-6 py-4 text-justify">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo fuga vitae corrupti!
                            Aperiam voluptates
                        </td>
                        <td class="px-6 py-4 text-center">
                            <img src="https://dummyimage.com/300x400" alt="" class="w-16 h-auto">
                        </td>
                        <td class="px-6 py-4 text-center">
                            Senin, 02 November 2023
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span
                                class="bg-red-50 border border-red-100 text-red-600 text-xs font-medium me-2 px-3 py-1.5 rounded-md">
                                Waiting
                            </span>
                        </td>
                        <td class="px-3 py-4">
                            <div class="flex flex-col sm:flex-row gap-1 justify-center items-center">
                                <button type="button"
                                    class="px-3 py-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <svg class="w-5 h-5 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                                        <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2">
                                            <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                                        </g>
                                    </svg>
                                </button>
                                <button type="button"
                                    class="px-3 py-2 text-sm font-medium text-center text-white bg-yellow-300 rounded-lg hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <svg class="w-5 h-5 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                    </svg>
                                </button>
                                <button type="button"
                                    class="px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <svg class="w-5 h-5 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-center bg-white pb-4 rounded-b-lg border-l border-r border-b border-gray-200">
            <nav aria-label="Page navigation example">
                <ul class="inline-flex -space-x-px text-sm">
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</main>
@endsection