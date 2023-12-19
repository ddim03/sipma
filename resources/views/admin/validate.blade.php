@extends('admin.layouts.main')

@section('content')
@include('admin.partials.navbar')
@include('admin.partials.sidebar')
<main class="px-4 py-2 sm:ml-64 bg-gray-50 font-roboto min-h-screen">
    <div class="p-0 sm:p-4 mt-14">
        <h3 class="text-3xl font-bold text-slate-800 mt-20 sm:mt-0 mb-1.5">Pengumuman</h3>
        <span class="block mb-4 text-sm text-gray-500">Halaman untuk mengelola data pengumuman</span>
        <div class="p-4 bg-white flex justify-between rounded-t border-t border-r border-l border-gray-200">
            <div class="relative h-11 w-1/2">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none w-full">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="searchInput" class=" w-full py-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari judul pengumuman">
            </div>
        </div>
        <div class="overflow-x-auto px-4 py-4 bg-white border-l border-r border-gray-200">
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
                    @foreach ($posts as $post)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-center">{{ $loop->index + 1 }}</td>
                        <td class="px-6 py-4 text-ellipsis">{{ $post->title }}</td>
                        <td class="px-6 py-4 text-justify">
                            @php
                            // Membersihkan tag HTML dari deskripsi
                            $cleanedDescription = strip_tags($post->deskripsi);

                            // Memisahkan deskripsi menjadi array kata-kata
                            $words = explode(' ', $cleanedDescription);

                            // Menggabungkan kata-kata menjadi string dengan maksimal 25 karakter per baris
                            $wrappedDescription = wordwrap($cleanedDescription, 25, "<br>\n", true);

                            // Memecah string menjadi array baris
                            $lines = explode("<br>\n", $wrappedDescription);

                            // Mengambil maksimal 3 baris
                            $trimmedLines = array_slice($lines, 0, 3);
                            @endphp

                            @foreach ($trimmedLines as $index => $line)
                            @if ($index === 2)
                            {{ Str::limit($line, 22) }}...
                            @else
                            {{ $line }}<br>
                            @endif
                            @endforeach
                        </td>

                        <td class="px-6 py-4 text-center">
                            <img src="{{ Storage::url('/' . $post->banner) }}" alt="{{ $post->title }}" class="w-24 h-auto">
                        </td>
                        <td class="px-6 py-4 text-center">{{ $post->published_at->format('l, d F Y') }}</td>
                        <td class="px-6 py-4 text-center">
                            <span class="{{ $post->is_validated ? 'bg-green-50 border border-green-100 text-green-600' : 'bg-red-50 border border-red-100 text-red-600' }} text-xs font-medium me-2 px-3 py-1.5 rounded-md">
                                {{ $post->is_validated ? 'Validated' : 'Waiting' }}
                            </span>
                        </td>
                        <td class="px-3 py-4">
                            <div class="flex flex-col sm:flex-row gap-1 justify-center items-center">
                                <a href="/validate/review/{{$post['post_id']}}" class="block px-3 py-2 text-sm font-medium text-center text-white bg-yellow-300 rounded hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                    <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17v1a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2M6 1v4a1 1 0 0 1-1 1H1m13.14.772 2.745 2.746M18.1 5.612a2.086 2.086 0 0 1 0 2.953l-6.65 6.646-3.693.739.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                                    </svg>
                                </a>
                                <a href="/validate/{{$post['post_id']}}" class=" block px-3 py-2 text-sm font-medium text-center text-white bg-green-600 rounded hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 1v4a1 1 0 0 1-1 1H1m4 6 2 2 4-4m4-8v16a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2Z" />
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
                        <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s hover:bg-gray-100 hover:text-gray-700">Previous</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e hover:bg-gray-100 hover:text-gray-700">Next</a>
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