<?php

namespace App\Filament\Resources\BudgetResource\Widgets;

use App\Models\Budget;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BudgetStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Budget', number_format(Budget::sum('amount'), 2))
                ->description('Sum of all budgets')
                ->descriptionIcon('heroicon-s-currency-dollar')
                ->color('success'),

            Stat::make('Total Categories', Budget::distinct('category_id')->count('category_id'))
                ->description('Sum of distinct categories')
                ->descriptionIcon('heroicon-s-chart-pie')
                ->color('primary'),
        ];
    }
}
