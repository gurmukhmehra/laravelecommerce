<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'role' => 'admin',
            'username' => 'admin',
            'firstName' => 'Super',
            'lastName' => 'Admin',
            'name' => 'Admin',
            'email' => 'admin@abc.com',
            'mobile' => '9000000000',
            'password' => Hash::make('admin'),
            'status' => 'active',
        ]);
    }
}
