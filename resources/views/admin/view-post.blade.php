@extends('admin.layouts.main')

@section('content')
@include('admin.partials.navbar')
@include('admin.partials.sidebar')
<main class="p-4 sm:ml-64 bg-gray-50 font-roboto min-h-screen">
    <div class="p-0 sm:p-4 mt-14">
        <h1 class="text-3xl font-bold text-slate-800 mt-20 sm:mt-0 mb-4">Detail Pengumuman</h1>
        <div class="p-5 bg-white flex flex-col j sm:flex-row rounded-lg border border-gray-200">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 w-4/5">
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Judul</h2>
                    <p class="text-sm text-slate-700">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Accusamus ducimus voluptates
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Slug</h2>
                    <p class="text-sm text-slate-700">
                        this-is-slug
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Admin</h2>
                    <p class="text-sm text-slate-700">
                        Dimas Gilang Dwi Aji
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Kategori</h2>
                    <p class="text-sm text-slate-700">
                        Kegiatan Belajar Mengajar
                    </p>
                </div>
                <div class="w-full">
                    <h2 class="text-md font-medium text-slate-700 mb-2">Published At</h2>
                    <p class="text-sm text-slate-700">
                        Senin, 02 November 2023
                    </p>
                </div>
            </div>
            <div class="mt-4 sm:mt-0 mx-auto">
                <img src="https://dummyimage.com/300x400" class="w-36 aspect-auto" alt="">
            </div>
        </div>
    </div>
    <div class="p-0 sm:p-4">
        <div class="p-5 bg-white rounded-lg border border-gray-200">
            <h1 class="text-md font-medium text-slate-700 mb-2">Isi Pengumuman</h1>
            <hr>
            <div class="mt-4">
                <h1 class="text-3xl font-bold text-slate-800">Lorem ipsum dolor sit amet</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, similique molestias! Quas assumenda
                    voluptate nemo animi recusandae ex aperiam rerum. Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Magnam laborum iusto nostrum delectus quidem provident! Nesciunt quasi hic beatae, molestiae,
                    vero officia saepe odio quo quibusdam porro aspernatur sequi eaque.
                </p>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas perspiciatis deleniti dolor,
                    inventore minima soluta omnis delectus fuga doloremque veniam aut suscipit, doloribus aperiam.
                    Laudantium asperiores ullam dolorem error dolores cupiditate praesentium velit. Voluptatibus maxime
                    laborum est delectus saepe quibusdam, quia impedit quisquam exercitationem quidem esse minima ea
                    quaerat temporibus?
                </p>
            </div>
        </div>
    </div>
</main>
@endsection