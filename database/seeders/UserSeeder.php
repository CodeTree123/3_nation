<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => '1',
            'first_name' => '3_Nation',
            'last_name' => 'Admin',
            'email' => 'admin@3nation.com',
            'phone' => '01*********',
            // 'password' => '$2y$10$M4AduO5h82AyuwcoRuODWOfNUdVVu419PazHnOuQsoqwIJp.6.XjK',
            'password' => Hash::make('rootadmin'),
        ]);
        User::create([
            'role_id' => '2',
            'first_name' => 'Dev',
            'last_name' => 'User',
            'email' => 'user@3nation.com',
            'phone' => '01988888888',
            'password' => Hash::make('12'),
        ]);
    }
}
