<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterServiceLinkResource\Pages;
use App\Models\FooterServiceLink;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class FooterServiceLinkResource extends Resource
{
    protected static ?string $model = FooterServiceLink::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-link';

    protected static string|UnitEnum|null $navigationGroup = 'Configuración';

    protected static ?string $navigationLabel = 'Links Footer Servicios';

    protected static ?string $modelLabel = 'Link de Servicio';

    protected static ?string $pluralModelLabel = 'Links de Servicios en Footer';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Link')
                    ->schema([
                        TextInput::make('label')
                            ->label('Texto')
                            ->required()
                            ->maxLength(100)
                            ->helperText('Texto que se mostrará en el footer'),

                        TextInput::make('url')
                            ->label('URL')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('/servicios')
                            ->helperText('Ruta o URL del enlace'),

                        TextInput::make('badge')
                            ->label('Badge')
                            ->maxLength(50)
                            ->placeholder('Nuevo')
                            ->helperText('Etiqueta opcional (ej: Nuevo, Destacado)'),

                        TextInput::make('order')
                            ->label('Orden')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),

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
                TextColumn::make('order')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('label')
                    ->label('Texto')
                    ->searchable(),

                TextColumn::make('url')
                    ->label('URL'),

                TextColumn::make('badge')
                    ->label('Badge')
                    ->badge()
                    ->color('success'),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->actions([
                EditAction::make()->label('Editar'),
                DeleteAction::make()->label('Eliminar'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFooterServiceLinks::route('/'),
            'create' => Pages\CreateFooterServiceLink::route('/create'),
            'edit' => Pages\EditFooterServiceLink::route('/{record}/edit'),
        ];
    }
}
