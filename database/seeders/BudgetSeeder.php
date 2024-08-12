<?php

namespace Database\Seeders;

use App\Models\Budget;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $budgets = [
            [
                'amount' => 1500.00,
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'amount' => 1300.00,
                'category_id' => 2,
                'user_id' => 1,
            ],
            [
                'amount' => 1200.00,
                'category_id' => 3,
                'user_id' => 1,
            ],
        ];

        foreach ($budgets as $budget) {
            Budget::create($budget);
        }
    }
}
