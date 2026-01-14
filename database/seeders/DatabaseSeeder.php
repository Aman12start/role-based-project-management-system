<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $this->call([
            AdminUserSeeder::class,
            UserSeeder::class,
        ]);
    }
}
