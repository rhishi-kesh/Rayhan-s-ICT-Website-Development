<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CompanyInformation extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('company_information')->insert(
            [
                'number' => '01632664532',
                'gmail' => 'rict@gmail.com',
                'logo' => 'dynamic.png',
                'facebook' => 'https://www.facebook.com/',
                'instragram' => 'https://www.instagram.com/',
                'linkeding' => 'https://www.linkedin.com/',
                'youtube' => 'https://www.youtube.com/',
                'locationText' => 'Dhaka, Bangladesh',
                'locationLink' => 'https://maps.app.goo.gl/DKQCWs9bvpT6Co819',
                'openClose' => 'Sat - Friday : 09:00 am - 09:00 pm',
                'eTinNo' => '197682866359',
                'tradeLienceNo' => 'TRAD/DNCC/037245/2022',
                'footerAbout' => 'Lorem ipsum dolor sit amet, consec tetur adipisicing elit, sed do eiusmod tempor incididuntut consec tetur adipisicing elit,Lorem ipsum dolor sit amet.
                ',
            ]
        );
        File::copy(
            public_path('dynamic.png'),
            Storage::path('public/companyInformation/dynamic.png')
        );
    }
}
