<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Thiago Silva',
            'email' => 'adsl.thiago@gmail.com',
            'password' => Hash::make('Gabriel@1212'),
            'is_admin' => true,
        ]);
    }
}
