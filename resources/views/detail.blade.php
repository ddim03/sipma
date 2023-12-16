@extends('layouts.main')

@section('content')
<section class="h-80 bg-[url('../img/hero.jpg')] bg-cover bg-center">
    <div class="w-full h-80 bg-gray-900 bg-opacity-75"></div>
</section>
<section class="-mt-32 lg:-mt-36">
    <div class="w-11/12 sm:w-4/5 mx-auto bg-white flex flex-col lg:flex-row py-4 rounded border shadow">
        <div class="w-full md:w-1/4 md:border-r-2 md:border-gray-200 flex justify-center px-4 mb-4 md:mb-0">
            <img src="{{ asset('images/2.jpg') }}" alt="asdasd"
                class="w-full md:w-[300px] h-auto md:h-[330px] cursor-pointer" id="show-img">
        </div>
        <div class="w-full md:w-3/4 px-4">
            <h1 class="text-gray-700 font-bold text-3xl mb-2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Acorporis laborum ea nulla quam unde!
            </h1>
            <p class="text-sm text-gray-400 mb-2">Senin 2 Oktober 2023 | From Dimas Gilang Dwi Aji</p>
            <span class="block bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded mb-4 w-fit">
                Akademik
            </span>
            <p class="text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit, provident
                cupiditate ullam
                voluptate voluptatibus repudiandae voluptatem doloribus velit reiciendis, dolor amet cum! Laborum
                recusandae animi distinctio pariatur amet nemo similique ipsum. Molestiae excepturi esse fuga saepe
                repellat iure natus eaque totam quia provident beatae exercitationem, nesciunt eveniet, accusamus
                tenetur officiis architecto officia! Rem veritatis mollitia consequuntur sequi libero veniam nostrum
                unde hic laudantium eaque? Consequuntur eaque quia atque earum quod! Hic minima omnis vero
                praesentium! Veniam, illo quod? Libero excepturi tempora reprehenderit ea obcaecati sed placeat,
                quas molestiae cumque vel impedit quibusdam totam quae similique. Labore molestias esse odio beatae.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. lorem100
            </p>
        </div>
    </div>
</section>
<section
    class="fixed top-0 lef-0 z-50 bg-gray-900 bg-opacity-90 w-full min-h-screen justify-center items-center scale-0"
    id="popup-bg">
    <div class="flex gap-3 flex-col-reverse justify-center items-center md:flex-row mt-4 scale-0 transition-all"
        id="popup-img">
        <img src="{{ asset('images/2.jpg') }}" alt="asdasd" class="w-[500px] h-auto">
        <button class="text-white" id="close-btn">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
</section>
@endsection