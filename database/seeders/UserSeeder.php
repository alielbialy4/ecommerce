<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Jhon Cena',
            'email' => 'user@gmail.com',
            'password' => Hash::make('aliali123'),
            // 'phone' => '012121212'
        ]);
    }
}
