<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // php artisan migrate:refresh --seed
        
        $this->call([
            AdminUserSeeder::class,
            CategorySeeder::class,
            BudgetSeeder::class,
            ExpenseSeeder::class
        ]);
    }
}
