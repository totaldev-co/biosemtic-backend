<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
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

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-newspaper';

    protected static string|UnitEnum|null $navigationGroup = 'Página Inicio';

    protected static ?string $navigationLabel = 'Novedades';

    protected static ?string $modelLabel = 'Novedad';

    protected static ?string $pluralModelLabel = 'Novedades';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
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

                        FileUpload::make('image')
                            ->label('Imagen')
                            ->image()
                            ->required()
                            ->disk('public')
                            ->directory('news')
                            ->visibility('public'),
                    ]),

                Section::make('Etiquetas')
                    ->schema([
                        TextInput::make('top_left_text')
                            ->label('Texto inferior izquierdo')
                            ->maxLength(100)
                            ->placeholder('Ej: Nombre del equipo'),

                        TextInput::make('top_right_text')
                            ->label('Texto inferior derecho')
                            ->maxLength(100)
                            ->placeholder('Ej: Venta de equipos'),
                    ]),

                Section::make('Enlace')
                    ->schema([
                        TextInput::make('link_text')
                            ->label('Texto del enlace')
                            ->required()
                            ->maxLength(100)
                            ->default('Ver más'),

                        TextInput::make('link_url')
                            ->label('URL del enlace')
                            ->required()
                            ->maxLength(255)
                            ->default('/contacto'),
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
                ImageColumn::make('image')
                    ->label('Imagen')
                    ->disk('public')
                    ->imageHeight(60),

                TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

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
            'index' => Pages\ListNews::route('/'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
