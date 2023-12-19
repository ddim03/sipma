@extends('admin.layouts.main')

@section('content')
    @include('admin.partials.navbar')
    @include('admin.partials.sidebar')

    <main class="px-4 py-4 md:py-2 sm:ml-64 bg-gray-50 font-roboto min-h-screen">
        <div class="p-0 sm:p-4 mt-14">
            <h3 class="text-3xl font-bold text-slate-800 mt-20 sm:mt-0 mb-1.5">Arsip</h3>
            <span class="block mb-4 text-sm text-gray-500">Halaman untuk mengelola data arsip</span>
            <div class="p-4 bg-white flex justify-between rounded-t border-l border-r border-t border-gray-200">
                <div class="relative h-11 w-3/5 sm:w-1/2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none w-full">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                
    <input type="search" id="searchInput" name="search"
           class="w-full py-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
           placeholder="Cari nama arsip">
                </div>
                <a href="/arsip/create"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-3 py-2 focus:outline-none flex justify-center items-center">
                    <svg class="w-4 h-4 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>Tambah
                </a>
            </div>
            <div class="overflow-x-auto px-4 py-4 bg-white border-l border-r border-gray-200">
                <table class="w-full text-sm text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 text-center">
                        <tr>
                            <th scope="col" class="px-4 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Admin
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Uploaded At
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($arsips as $arsip)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 text-center">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-ellipsis">
                                    {{ $arsip->nama }}
                                </td>
                                <td class="px-6 py-4 text-justify">
                                    {{ $arsip->deskripsi }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $arsip->admin->nama }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $arsip->created_at->format('l, d F Y') }}
                                </td>
                                <td class="px-3 py-4 text-center">
                                    <div class="flex flex-col sm:flex-row gap-1 justify-center items-center">
                                        <a href="{{ route('arsip.show', $arsip->id) }}"
                                            class="block px-3 py-2 text-sm font-medium text-center text-white bg-green-600 rounded hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <svg class="w-5 h-5 text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                                                <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2">
                                                    <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path
                                                        d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                                                </g>
                                            </svg>
                                        </a>
                                        <a href="{{ route('arsip.edit', $arsip->id) }}"
                                            class="block px-3 py-2 text-sm font-medium text-center text-white bg-yellow-300 rounded hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <svg class="w-5 h-5 text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center bg-white pb-4 rounded-b border-l border-r border-b border-gray-200">
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
    </main>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');

        searchInput.addEventListener('input', function () {
            const keyword = searchInput.value.toLowerCase();

            // Mendapatkan semua elemen baris
            const rows = document.querySelectorAll('tbody tr');

            // Menyaring baris berdasarkan judul pengumuman
            rows.forEach(row => {
                const titleCell = row.cells[1]; // Kolom judul

                // Menyembunyikan atau menampilkan baris berdasarkan keyword
                if (titleCell.textContent.toLowerCase().includes(keyword)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection
