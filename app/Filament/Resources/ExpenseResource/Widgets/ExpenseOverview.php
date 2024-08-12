<?php

namespace App\Filament\Resources\ExpenseResource\Widgets;

use App\Models\Category;
use App\Models\Expense;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ExpenseOverview extends BaseWidget
{
    protected function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        $totalExpenses = Expense::sum('amount');
        $categoryCount = Expense::distinct('category_id')->count('category_id');

        return [
            Stat::make('Total Expenses', number_format($totalExpenses, 2) . ' MAD')
                ->description('Sum of all expenses')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('primary'),

            Stat::make('Total Categories', $categoryCount)
                ->description('Number of categories')
                ->descriptionIcon('heroicon-m-tag')
                ->color('success'),
        ];
    }
}
