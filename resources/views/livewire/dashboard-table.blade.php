<div>
    <div class="mt-4 p-4 rounded bg-white border border-gray-200 shadow-sm">
        <div class="relative h-11 w-full sm:w-1/2">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none w-full">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" wire:model.live="search"
                class=" w-full py-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Cari judul pengumuman">
        </div>
        <div class="overflow-x-auto pt-4 bg-white rounded-b">
            <table class="w-full text-sm text-gray-500 mb-4">
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
                    @foreach ($posts as $post)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 text-center">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-ellipsis">
                            {{ $post->judul }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $post->category->nama }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $post->admin->nama }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $post->created_at->format('l, d F Y') }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if ($post->is_validated == 1)
                            <span
                                class="bg-green-50 border border-green-100 text-green-600 text-xs font-medium me-2 px-3 py-1.5 rounded">
                                Validated
                            </span>
                            @else
                            <span
                                class="bg-red-50 border border-red-100 text-red-600 text-xs font-medium me-2 px-3 py-1.5 rounded">
                                Waiting
                            </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </div>
</div>