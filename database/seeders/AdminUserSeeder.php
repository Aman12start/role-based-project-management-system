<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::updateOrCreate(
            ['email' => 'admin@test.com'], //unique key
            ['name' => 'Super Admin',
            'password' => Hash::make('Admin@123'),
            'role' => 'admin',
        ]);
    }
}
