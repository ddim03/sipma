<div>
    <div class="p-4 bg-white flex justify-between rounded-t border-t border-r border-l border-gray-200">
        <div class="relative h-11 w-1/2">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none w-full">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search" wire:model.live="search"
                class=" w-full py-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Cari judul pengumuman">
        </div>
    </div>
    <div class="overflow-x-auto px-4 py-4 bg-white border-l border-r rounded-b border-b border-gray-200">
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
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Admin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Banner
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
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
                    <td class=" px-4 py-2 text-center">{{ $loop->iteration }}</td>
                    <td class="px-6 py-2 text-ellipsis">
                        {{ $post->judul }}
                    </td>
                    <td class="px-6 py-2 text-justify">
                        {{Str::limit(strip_tags($post->isi), 75)}}
                    </td>
                    <td class="px-4 py-2 text-center">
                        {{$post->admin->nama}}
                    </td>
                    <td class="px-6 py-2 text-center">
                        <img src="{{ asset('storage/'.$post->gambar)}}" alt="" class="w-20 h-auto">
                    </td>
                    <td class="px-6 py-2 text-center">
                        {{ $post->created_at->format('l, d F Y') }}
                    </td>
                    <td class="px-6 py-2 text-center">
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
                    <td class="px-3 py-4">
                        <div class="flex flex-col gap-3 justify-center items-center">
                            <div id="review" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-800 bg-white rounded shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Review
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <div id="validasi" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-800 bg-white rounded shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Validasi
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <a href="{{ route('post.review', $post->slug) }}" data-tooltip-target="review"
                                data-tooltip-style="light" data-tooltip-placement="left"
                                class="block px-3 py-2 text-sm font-medium text-center text-white bg-yellow-300 rounded hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 17v1a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2M6 1v4a1 1 0 0 1-1 1H1m13.14.772 2.745 2.746M18.1 5.612a2.086 2.086 0 0 1 0 2.953l-6.65 6.646-3.693.739.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                                </svg>
                            </a>
                            <form action="{{ route('post.validasi', $post->slug) }}" method="post">
                                @csrf
                                @method("PUT")
                                <button type="submit" data-tooltip-target="validasi" data-tooltip-style="light"
                                    data-tooltip-placement="left"
                                    class=" block px-3 py-2 text-sm font-medium text-center text-white bg-green-600 rounded hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <svg class="w-5 h-5 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 1v4a1 1 0 0 1-1 1H1m4 6 2 2 4-4m4-8v16a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2Z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
</div>