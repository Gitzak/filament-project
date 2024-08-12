<?php

namespace App\Filament\Resources\ExpenseResource\Pages;

use App\Filament\Resources\ExpenseResource;
use App\Filament\Resources\ExpenseResource\Widgets\ExpenseOverview;
use App\Models\Category;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListExpenses extends ListRecords
{
    protected static string $resource = ExpenseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ExpenseOverview::class,
        ];
    }

    public function getTabs(): array
    {
        $categories = Category::all();

        $tabs = [
            'all' => Tab::make('All'),
        ];

        foreach ($categories as $category) {
            $tabs[$category->slug ?? 'category-' . $category->id] = Tab::make($category->name)
                ->modifyQueryUsing(fn(Builder $query) => $query->where('category_id', $category->id));
        }

        return $tabs;
    }
}
