<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'admin@admin.com'], // Unique identifier to find the user
            [
                'name' => 'Admin',
                'password' => Hash::make('Test@123'), // Update or create with these values
            ]
        );
        User::updateOrCreate(
            ['email' => 'superAdmin@admin.com'], // Unique identifier to find the user
            [
                'name' => 'Super Admin',
                'password' => Hash::make('Test@123'), // Update or create with these values
            ]
        );
        $this->call(OrganizationSeeder::class);
        $this->call(AboutSeeder::class);
    }
}
