<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for the categories table
        $categories = [
            ['name' => 'akademik', 'slug' => 'akademik', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'kbm', 'slug' => 'kbm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'kemahasiswaan', 'slug' => 'kemahasiswaan', 'created_at' => now(), 'updated_at' => now()],
            // Add more category entries as needed
        ];

        // Insert data into the categories table
        DB::table('categories')->insert($categories);
    }
}
