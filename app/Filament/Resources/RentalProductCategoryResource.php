<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RentalProductCategoryResource\Pages;
use App\Models\RentalProductCategory;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class RentalProductCategoryResource extends Resource
{
    protected static ?string $model = RentalProductCategory::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-tag';

    protected static string|UnitEnum|null $navigationGroup = 'Página Servicios';

    protected static ?string $navigationLabel = 'Categorías de Alquiler';

    protected static ?string $modelLabel = 'Categoría de Alquiler';

    protected static ?string $pluralModelLabel = 'Categorías de Alquiler';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Información de la Categoría')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Descripción')
                            ->rows(3)
                            ->maxLength(500),
                    ]),

                Section::make('Configuración')
                    ->schema([
                        TextInput::make('order')
                            ->label('Orden')
                            ->numeric()
                            ->default(0)
                            ->required(),

                        Toggle::make('is_active')
                            ->label('Activo')
                            ->default(true)
                            ->helperText('Al desactivar, también se desactivarán los productos de esta categoría'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('rental_products_count')
                    ->label('Productos')
                    ->counts('rentalProducts')
                    ->badge()
                    ->color('info'),

                TextColumn::make('order')
                    ->label('Orden')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),

                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->recordActions([
                EditAction::make()
                    ->label('Editar'),
                DeleteAction::make()
                    ->label('Eliminar'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRentalProductCategories::route('/'),
            'create' => Pages\CreateRentalProductCategory::route('/create'),
            'edit' => Pages\EditRentalProductCategory::route('/{record}/edit'),
        ];
    }
}
