<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AdminrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = 'admin';

        DB::table('users')->insert([
            'email'=> 'admin@gmail.com',
            'password'=> Crypt::encryptString($password)
        ]);
    }
}
