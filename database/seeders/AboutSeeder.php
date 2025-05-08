<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('abouts')->insert([
            'title' => 'We are for social causes',
            'sub_title' => 'We exist for non-profits, social enterprises, community groups, activists,lorem politicians and individual citizens that are making.',
            'description' => '<p> <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore minima atque obcaecati deleniti tempora, cumque molestiae consectetur provident temporibus natus iste accusamus totam voluptas quas suscipit blanditiis fuga quibusdam porro.</p> <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>   </p>',
            'side_image' => 'resources/about-main1.jpg',
        ]);
    }
}
