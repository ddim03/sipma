@extends('layouts.main')

@section('content')

<main class="p-4 bg-gray-50 font-roboto min-h-screen">
    <section class="w-full md:w-4/5 px-3 md:px-0 pt-6 mx-auto max-w-screen-xl">
        <div class="p-0 sm:p-4 mt-14">
            <h1 class="text-3xl font-bold text-slate-800 mt-20 sm:mt-0">Kategori</h1>
        </div>
        <div class="p-0 sm:p-4">
            <div class="p-5 bg-white rounded-lg border border-gray-200">
                <div class="p-0 sm:p-4">    
                    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-4" />
                    <div class="flex justify-center items-center">
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('images/1.jpg') }}" alt="image description">
                    </div>
                    <div class="mb-6 mt-6 flex items-center">
                        <img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-Picture.png" class="mr-2 h-8 rounded-full" alt="avatar"
                        loading="lazy" />
                        <div>
                            <span> Published <u>15.07.2020</u> by </span>
                            <a href="#!" class="font-medium">Sayit Abdullah</a>
                        </div>
                    </div>
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
        </div>
        <div class="pl-4">
            <a href="/" type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                Kembali
            </a>
        </div>
    </section>
</main>
@endsection