<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = 'admin';

        DB::table('users')->insert([
            'name'=> 'admin',
            'email'=> 'admin@gmail.com',
            'password'=> Hash::make($password),
            'position'=> 'user',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
