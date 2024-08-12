<?php

namespace App\Filament\Widgets;

use App\Models\Budget;
use App\Models\Category;
use App\Models\Expense;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalBudgets = Budget::sum('amount');
        $totalExpenses = Expense::sum('amount');
        $totalCategories = Category::count();

        return [
            Stat::make('Total Budget', number_format($totalBudgets, 2).' MAD')
                ->description('Total allocated budget')
                ->color('success'),

            Stat::make('Total Expenses', number_format($totalExpenses, 2).' MAD')
                ->description('Total expenses so far')
                ->color('danger'),

            Stat::make('Total Categories', $totalCategories)
                ->description('Number of categories')
                ->color('primary'),
        ];
    }
}
