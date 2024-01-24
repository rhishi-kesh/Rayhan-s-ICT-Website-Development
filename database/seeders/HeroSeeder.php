<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hero_information')->insert(
            [
                'title' => "Rayhan's ICT dolor amet consectetur adipisicing elit. Et?",
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptas rerum veniam consequuntur enim. Nemo nostrum, autem architecto consequuntur.',
                'video' => 'https://youtu.be/olEj-7QEsj4?si=tUbrqMi3yhhws1YM',
                'thumbnail' => 'banner.jpg'
            ]
        );
        File::copy(
            public_path('banner.jpg'),
            Storage::path('public/heroInformation/banner.jpg')
        );
    }
}
