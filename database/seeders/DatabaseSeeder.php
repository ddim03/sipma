<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Akademik',
                'slug' => 'akademik',
            ],
            [
                'name' => 'Kemahasiswaan',
                'slug' => 'kemahasiswaan',
            ]
        ]);

        DB::table('admin')->insert([
            [
                'nama' => 'Admin Akademik',
                'username' => 'admin-akademik',
                'password' => bcrypt('12345'),
                'is_kaprodi' => false
            ],
            [
                'nama' => 'Admin Kemahasiswaan',
                'username' => 'admin-mhs',
                'password' => bcrypt('12345'),
                'is_kaprodi' => false
            ],
            [
                'nama' => 'Kaprodi',
                'username' => 'kaprodi',
                'password' => bcrypt('12345'),
                'is_kaprodi' => true
            ]
        ]);

        \App\Models\Arsip::factory(10)->create();
        \App\Models\Post::factory(10)->create();
    }
}