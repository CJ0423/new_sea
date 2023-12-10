<?php

namespace Database\Seeders;

use Carbon\Carbon as CarbonCarbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'CJ',
            'email' => 'as@example.com',
            'password' => HASH::make('asdf4521'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        //
    }
}
