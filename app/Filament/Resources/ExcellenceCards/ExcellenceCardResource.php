<?php

namespace App\Filament\Resources\ExcellenceCards;

use App\Filament\Resources\ExcellenceCards\Pages\EditExcellenceCard;
use App\Filament\Resources\ExcellenceCards\Pages\ListExcellenceCards;
use App\Models\ExcellenceCard;
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

class ExcellenceCardResource extends Resource
{
    protected static ?string $model = ExcellenceCard::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-star';

    protected static string|UnitEnum|null $navigationGroup = 'Página Nosotros';

    protected static ?string $navigationLabel = 'Excelencia';

    protected static ?string $modelLabel = 'Tarjeta de Excelencia';

    protected static ?string $pluralModelLabel = 'Tarjetas de Excelencia';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información de la Tarjeta')
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
                            ->directory('excellence')
                            ->visibility('public')
                            ->helperText('Icono de la tarjeta (PNG recomendado)'),
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
            'index' => ListExcellenceCards::route('/'),
            'edit' => EditExcellenceCard::route('/{record}/edit'),
        ];
    }
}
