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
        DB::table('users')->insert(array(
            array(
                'name' => 'Admin Jaehyun',
                'phone' => '081374783194',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 1,
            ),
            array(
                'name' => 'Staff Haecan',
                'phone' => '081374783195',
                'email' => 'staff@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 2,
            ),
            array(
                'name' => 'User Mark',
                'phone' => '081374783196',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 3,
            ),
        ));
    }
}
