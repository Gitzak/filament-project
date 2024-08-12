<?php

namespace App\Filament\Resources\BudgetResource\Pages;

use App\Filament\Resources\BudgetResource;
use App\Filament\Resources\BudgetResource\Widgets\BudgetStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBudgets extends ListRecords
{
    protected static string $resource = BudgetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            BudgetStats::class,
        ];
    }
}
