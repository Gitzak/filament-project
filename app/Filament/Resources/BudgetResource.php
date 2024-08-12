<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BudgetResource\Pages;
use App\Filament\Resources\BudgetResource\RelationManagers;
use App\Filament\Resources\BudgetResource\Widgets\BudgetStats;
use App\Models\Budget;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BudgetResource extends Resource
{
    protected static ?string $model = Budget::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 2;

    public static function getGloballySearchableAttributes(): array
    {
        return ['amount', 'category.name'];
    }

    public static function getNavigationBadge(): ?string
    {
        return 'Ljadid';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')->required()->numeric(),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->user()->id),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('amount')
                    ->label('Amount')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn($state) => number_format($state, 2) . ' MAD')
                    ->extraAttributes(['class' => 'text-right']),
                Tables\Columns\TextColumn::make('category.name')->label('Category')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('user.name')->label('User')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->date()->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBudgets::route('/'),
            'create' => Pages\CreateBudget::route('/create'),
            'edit' => Pages\EditBudget::route('/{record}/edit'),
        ];
    }
}
