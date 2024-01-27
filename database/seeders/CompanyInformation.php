<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'linkedin' => 'https://www.linkedin.com/',
                'youtube' => 'https://www.youtube.com/',
                'locationText' => 'Dhaka, Bangladesh',
                'locationLink' => 'https://maps.app.goo.gl/DKQCWs9bvpT6Co819',
                'openClose' => 'Sat - Friday : 09:00 am - 09:00 pm',
                'eTinNo' => '197682866359',
                'tradeLienceNo' => 'TRAD/DNCC/037245/2022',
                'footerAbout' => 'Lorem ipsum dolor sit amet, consec tetur adipisicing elit, sed do eiusmod tempor incididuntut consec tetur adipisicing elit,Lorem ipsum dolor sit amet.
                ',
                'googlemap' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.3263834967843!2d90.36703137417396!3d23.806990286603614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1f95d0e1503%3A0x5882b8ecae1a5a0c!2sRayhan&#39;s%20ICT!5e0!3m2!1sen!2sbd!4v1706329923288!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        );
        File::copy(
            public_path('dynamic.png'),
            Storage::path('public/companyInformation/dynamic.png')
        );
    }
}
