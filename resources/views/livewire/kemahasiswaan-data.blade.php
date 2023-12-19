<div>
    @if (count($posts) > 0)
    <div class="flex mt-4 ">
        <div class="w-full md:w-1/2">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" wire:model.live="search"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Cari judul pengumuman...">
            </div>
        </div>
    </div>
    @endif
    <div class="w-full grid grid-cols-1 {{ count($posts) > 0 ? 'lg:grid-cols-2' : '' }} mt-5 mb-14 gap-3">
        @forelse ($posts as $post)
        <a href="/detail/{{$post->slug}}"
            class="flex flex-col items-start bg-white border border-gray-200 rounded shadow md:flex-row  hover:bg-blue-50 hover:bg-opacity-50 overflow-hidden">
            <img class="object-cover object-center w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l"
                src="{{ asset('storage/'. $post->gambar) }}" alt="{{ $post->judul }}">
            <div class="flex flex-col justify-between px-4 py-3 leading-normal overflow-hidden">
                <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded mb-2 w-fit">
                    {{ $post->category->nama}}
                </span>
                <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 md:truncate">{{ $post->judul }}</h5>
                <div class="text-xs text-slate-500 mb-2">From {{ $post->admin->nama }}</div>
                <p class="mb-5 font-normal text-gray-700 te">{{ Str::limit(strip_tags($post->isi), 100) }}</p>
                <div class="flex w-full justify-end text-xs text-slate-500">
                    Published at {{ $post->created_at->format('l, d F Y') }}
                </div>
            </div>
        </a>
        @empty
        <div class="w-full flex justify-center items-center h-24">
            <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <p class="ml-3 text-gray-400 font-medium">Belum ada pengumuman</p>
        </div>
        @endforelse
    </div>
    {{ $posts->links() }}
</div>