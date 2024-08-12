<?php

namespace Database\Seeders;

use App\Models\Expense;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expenses = [
            [
                'title' => 'Groceries',
                'amount' => 1200.00,
                'date' => '2024-08-01',
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'title' => 'Bus Ticket',
                'amount' => 250.00,
                'date' => '2024-08-02',
                'category_id' => 2,
                'user_id' => 1,
            ],
            [
                'title' => 'Electricity Bill',
                'amount' => 500.00,
                'date' => '2024-08-03',
                'category_id' => 3,
                'user_id' => 1,
            ],
        ];

        foreach ($expenses as $expense) {
            Expense::create($expense);
        }
    }
}
