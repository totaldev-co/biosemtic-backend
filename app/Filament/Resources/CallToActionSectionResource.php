<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CallToActionSectionResource\Pages;
use App\Models\CallToActionSection;
use BackedEnum;
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

class CallToActionSectionResource extends Resource
{
    protected static ?string $model = CallToActionSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-megaphone';

    protected static string|UnitEnum|null $navigationGroup = 'Página Nosotros';

    protected static ?string $navigationLabel = 'Call To Action';

    protected static ?string $modelLabel = 'Call To Action';

    protected static ?string $pluralModelLabel = 'Call To Action';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contenido')
                    ->schema([
                        TextInput::make('title')
                            ->label('Título')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Descripción')
                            ->required()
                            ->rows(3)
                            ->maxLength(500),
                    ]),

                Section::make('Botón Primario')
                    ->schema([
                        TextInput::make('primary_button_text')
                            ->label('Texto del botón')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('primary_button_url')
                            ->label('URL del botón')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('/contacto'),
                    ])
                    ->columns(2),

                Section::make('Botón Secundario')
                    ->schema([
                        TextInput::make('secondary_button_text')
                            ->label('Texto del botón')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('secondary_button_url')
                            ->label('URL del botón')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('/servicios'),
                    ])
                    ->columns(2),

                Section::make('Configuración')
                    ->schema([
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
                TextColumn::make('title')
                    ->label('Título')
                    ->limit(50),

                TextColumn::make('primary_button_text')
                    ->label('Botón Primario'),

                TextColumn::make('secondary_button_text')
                    ->label('Botón Secundario'),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),

                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCallToActionSections::route('/'),
            'edit' => Pages\EditCallToActionSection::route('/{record}/edit'),
        ];
    }
}
