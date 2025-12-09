<?php

namespace App\Filament\Resources\CompanyValues;

use App\Filament\Resources\CompanyValues\Pages\EditCompanyValue;
use App\Filament\Resources\CompanyValues\Pages\ListCompanyValues;
use App\Models\CompanyValue;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
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

class CompanyValueResource extends Resource
{
    protected static ?string $model = CompanyValue::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-heart';

    protected static string|UnitEnum|null $navigationGroup = 'Página Nosotros';

    protected static ?string $navigationLabel = 'Valores';

    protected static ?string $modelLabel = 'Valor de la Empresa';

    protected static ?string $pluralModelLabel = 'Valores de la Empresa';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Información del Valor')
                    ->schema([
                        TextInput::make('title')
                            ->label('Título')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Descripción')
                            ->required()
                            ->rows(4)
                            ->maxLength(500)
                            ->columnSpanFull(),

                        FileUpload::make('icon')
                            ->label('Icono')
                            ->image()
                            ->disk('public')
                            ->directory('values')
                            ->visibility('public')
                            ->helperText('Icono del valor (PNG recomendado)'),
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
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icon')
                    ->label('Icono')
                    ->disk('public')
                    ->imageSize(40),

                TextColumn::make('title')
                    ->label('Título')
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

    public static function getPages(): array
    {
        return [
            'index' => ListCompanyValues::route('/'),
            'edit' => EditCompanyValue::route('/{record}/edit'),
        ];
    }
}
