@extends('layout.main')

@section('content')
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-300 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Arsip
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Admin id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        created_at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        blabla
                    </th>
                    <td class="px-6 py-4">
                        1
                    </td>
                    <td class="px-6 py-4">
                        sdcjsbsvkdjvnskd
                    </td>
                    <td class="px-6 py-4">
                        21-09-2023
                    </td>
                    <td class="px-6 py-4">
                        <a href="#"class="px-3 py-2 text-sm font-medium text-center text-white bg-red-600 
                        rounded-md hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300">Download</a>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr class="bg-white border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        blabla
                    </th>
                    <td class="px-6 py-4">
                        1
                    </td>
                    <td class="px-6 py-4">
                        sdcjsbsvkdjvnskd
                    </td>
                    <td class="px-6 py-4">
                        21-09-2023
                    </td>
                    <td class="px-6 py-4">
                        <a href="#"class="px-3 py-2 text-sm font-medium text-center text-white bg-red-600 
                         rounded-md hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300">Download</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
@endsection