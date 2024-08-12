<?php

namespace App\Filament\Widgets;

use App\Models\Expense;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;
use Filament\Support\RawJs;
use Illuminate\Support\Facades\DB;

class BudgetChart extends ChartWidget
{
    protected static ?string $heading = 'Budget Chart';
    protected static ?string $maxHeight = '300px';
    public ?string $filter = '2024';

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $year = $this->filter;

        $expenses = Expense::select(
            DB::raw('MONTH(date) as month'),
            DB::raw('SUM(amount) as total')
        )
            ->whereYear('date', $year)
            ->groupBy(DB::raw('MONTH(date)'))
            ->orderBy('month')
            ->get();

        $monthlyExpenses = array_fill(0, 12, 0);
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        foreach ($expenses as $expense) {
            $monthlyExpenses[$expense->month - 1] = $expense->total;
        }

        return [
            'labels' => $months,
            'datasets' => [
                [
                    'label' => "Expenses for $year",
                    'data' => $monthlyExpenses,
                    'borderColor' => '#007bff',
                    'backgroundColor' => 'rgba(0, 123, 255, 0.1)',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getFilters(): ?array
    {
        return [
            '2023' => '2023',
            '2024' => '2024',
            '2025' => '2025',
            '2026' => '2026',
        ];
    }

    protected function getDefaultFilter(): ?string
    {
        return now()->year;
    }

    protected function getOptions(): RawJs
    {
        return RawJs::make(<<<JS
        {
            scales: {
                y: {
                    ticks: {
                        callback: (value) => value + ' MAD',
                    },
                },
            },
        }
    JS);
    }
}
