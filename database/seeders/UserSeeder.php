<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Bendahara',
                'email' => 'bendahara@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('bendahara123'),
                'role' => 'bendahara',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pengurus',
                'email' => 'pengurus@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('pengurus123'),
                'role' => 'pengurus',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
