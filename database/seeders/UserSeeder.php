<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use function Carbon\Traits\make;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => 1,
           'name' => 'Ali',
           'email' => 'Ali@gmail.com',
           'password' => Hash::make('parol')
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Guli',
            'email' => 'Guli@gmail.com',
            'password' => Hash::make('parol123')
        ]);
    }
}
