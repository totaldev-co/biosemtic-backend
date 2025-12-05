<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NavigationItemResource\Pages;
use App\Models\NavigationItem;
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

class NavigationItemResource extends Resource
{
    protected static ?string $model = NavigationItem::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-bars-3';

    protected static string|UnitEnum|null $navigationGroup = 'Configuración';

    protected static ?string $navigationLabel = 'Menú de Navegación';

    protected static ?string $modelLabel = 'Item de Navegación';

    protected static ?string $pluralModelLabel = 'Menú de Navegación';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Item')
                    ->schema([
                        TextInput::make('name')
                            ->label('Identificador')
                            ->required()
                            ->maxLength(50)
                            ->unique(ignoreRecord: true)
                            ->helperText('Identificador único (ej: home, nosotros, productos)'),

                        TextInput::make('label')
                            ->label('Texto del Menú')
                            ->required()
                            ->maxLength(100)
                            ->helperText('Texto que se mostrará en el menú'),

                        TextInput::make('path')
                            ->label('Ruta')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('/ruta')
                            ->helperText('Ruta de navegación (ej: /, /nosotros, /productos)'),

                        TextInput::make('order')
                            ->label('Orden')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->helperText('Orden de aparición en el menú'),

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

                TextColumn::make('name')
                    ->label('Identificador')
                    ->searchable(),

                TextColumn::make('label')
                    ->label('Texto')
                    ->searchable(),

                TextColumn::make('path')
                    ->label('Ruta'),

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
            'index' => Pages\ListNavigationItems::route('/'),
            'create' => Pages\CreateNavigationItem::route('/create'),
            'edit' => Pages\EditNavigationItem::route('/{record}/edit'),
        ];
    }
}
