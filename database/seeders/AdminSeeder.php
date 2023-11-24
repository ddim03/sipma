<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for the admin table
        $admins = [
            [
                'nama' => 'Admin1',
                'username' => 'admin1',
                'password' => Hash::make('password1'),
                'is_kaprodi' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Admin2',
                'username' => 'admin2',
                'password' => Hash::make('password2'),
                'is_kaprodi' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more admin entries as needed
        ];

        // Insert data into the admin table
        DB::table('admin')->insert($admins);
    }
}
