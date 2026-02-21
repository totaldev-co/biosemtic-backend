<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicePlanResource\Pages;
use App\Models\ServicePlan;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class ServicePlanResource extends Resource
{
    protected static ?string $model = ServicePlan::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static string|UnitEnum|null $navigationGroup = 'Página Servicios';

    protected static ?string $navigationLabel = 'Planes de Mantenimiento';

    protected static ?string $modelLabel = 'Plan de Mantenimiento';

    protected static ?string $pluralModelLabel = 'Planes de Mantenimiento';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Información del Plan')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre del plan')
                            ->required()
                            ->maxLength(100)
                            ->helperText('Ej: Plan Plus, Plan Premium, Plan Pro'),

                        FileUpload::make('icon')
                            ->label('Icono del plan')
                            ->image()
                            ->disk('public')
                            ->directory('plans')
                            ->visibility('public')
                            ->imagePreviewHeight('80')
                            ->helperText('Icono que aparece en la tarjeta del plan'),

                        Toggle::make('is_popular')
                            ->label('Marcar como "Más popular"')
                            ->default(false)
                            ->helperText('Muestra una etiqueta especial en la tarjeta')
                            ->live(),

                        FileUpload::make('popular_arrow_icon')
                            ->label('Icono de flecha "Más popular"')
                            ->disk('public')
                            ->directory('plans')
                            ->visibility('public')
                            ->acceptedFileTypes(['image/svg+xml', 'image/*'])
                            ->imagePreviewHeight('50')
                            ->helperText('Flecha decorativa que apunta a la tarjeta popular')
                            ->visible(fn($get) => $get('is_popular')),
                    ]),

                Section::make('Características del Plan')
                    ->schema([
                        Repeater::make('features')
                            ->label('Lista de beneficios')
                            ->simple(
                                TextInput::make('feature')
                                    ->required()
                                    ->placeholder('Ej: Dos visitas anuales, una cada seis meses')
                            )
                            ->defaultItems(3)
                            ->reorderable()
                            ->addActionLabel('Agregar beneficio'),
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
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icon')
                    ->label('Icono')
                    ->disk('public')
                    ->circular()
                    ->imageSize(40),

                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

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
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServicePlans::route('/'),
            'edit' => Pages\EditServicePlan::route('/{record}/edit'),
        ];
    }
}
