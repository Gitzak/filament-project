<?php

namespace App\Filament\Resources\ExpenseResource\Widgets;

use App\Models\Category;
use App\Models\Expense;
use Carbon\Carbon;
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

        // Calculate totals for the last three months
        $months = collect([]);
        $expensesPerMonth = collect([]);

        for ($i = 2; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i)->format('F Y');
            $monthStart = Carbon::now()->subMonths($i)->startOfMonth();
            $monthEnd = Carbon::now()->subMonths($i)->endOfMonth();
            $expensesForMonth = Expense::whereBetween('date', [$monthStart, $monthEnd])->sum('amount');

            $months->push($month);
            $expensesPerMonth->push($expensesForMonth);
        }


        $categoryCount = Expense::distinct('category_id')->count('category_id');

        return [
            Stat::make('Total Expenses', number_format($totalExpenses, 2) . ' MAD')
                ->description('Sum of all expenses')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('primary')
                ->chart($expensesPerMonth->toArray())  // Add the chart data
                ->extraAttributes(['style' => 'font-size: 0.75rem']) // Optional: style for smaller text
                ->description('Data for the last 3 months'),

            Stat::make('Total Categories', $categoryCount)
                ->description('Number of categories')
                ->descriptionIcon('heroicon-m-tag')
                ->color('success'),
        ];
    }
}
