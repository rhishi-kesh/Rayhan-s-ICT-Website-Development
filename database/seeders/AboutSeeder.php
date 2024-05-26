<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
    */
    public function run(): void
    {
        DB::table('abouts')->insert(
            [
                'chooseUs' => 'Interior Bangladesh has been doing attractive and quality interior work for more than 6 years.We believe that every client has some dreams and ensure maximum commitment and punctuality to fulfill those dreams. So put your trust and faith in Interior Bangladesh to make your dreams come true.',
                'chooseUsImage' => 'choose.png',
                'missionVision' => 'Interior Bangladesh has been doing attractive and quality interior work for more than 6 years.We believe that every client has some dreams and ensure maximum commitment and punctuality to fulfill those dreams. So put your trust and faith in Interior Bangladesh to make your dreams come true.',
                'missionVisionImage' => 'missionVision.png',
                'successfullStudent' => '120',
                'courseComplete' => '200',
                'successRatio' => '60%',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        );
        File::copy(
            public_path('choose.png'),
            Storage::path('public/about/choose/choose.png')
        );
        File::copy(
            public_path('missionVision.png'),
            Storage::path('public/about/missionVision/missionVision.png')
        );
    }
}
