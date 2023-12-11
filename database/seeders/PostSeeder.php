<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for the posts table
        $posts = [
            [
                'category_id' => 1,
                'admin_id' => 1,
                'title' => 'Sample Post 1',
                'slug' => Str::slug('Sample Post 1'),
                'banner' => 'sample1.jpg',
                'deskripsi' => 'This is the content of Sample Post 1.',
                'published_at' => Carbon::now(),
                'is_validated' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'admin_id' => 2,
                'title' => 'Sample Post 2',
                'slug' => Str::slug('Sample Post 2'),
                'banner' => 'sample2.jpg',
                'deskripsi' => 'This is the content of Sample Post 2.',
                'published_at' => Carbon::now(),
                'is_validated' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more post entries as needed
        ];

        // Insert data into the posts table
        DB::table('posts')->insert($posts);
    }
}
