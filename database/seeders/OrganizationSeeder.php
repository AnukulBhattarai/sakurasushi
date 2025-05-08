<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('organizations')->insert([
            'name' => 'Loreum Ipsum',
            'address' => 'Kathmandu, Nepal',
            'phone' => '980-00000000',
            'mobile' => '980-00000000',
            'email' => 'info@gmail.com',
        ]);
        // 'slogan'=>'Education for Peace and Prosperity'
    }
}
