<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
    'name' => 'Admin1',
    'email' => 'admin1@gmail.com',
    'password' => Hash::make('12345678'),
]);

User::create([
    'name' => 'Admin2',
    'email' => 'admin2@gmail.com',
    'password' => Hash::make('12345678'),
]);
    }
}
