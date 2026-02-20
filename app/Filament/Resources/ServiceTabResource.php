<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceTabResource\Pages;
use App\Models\ServiceTab;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
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

class ServiceTabResource extends Resource
{
    protected static ?string $model = ServiceTab::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static string|UnitEnum|null $navigationGroup = 'Página Servicios';

    protected static ?string $navigationLabel = 'Pestañas de Servicios';

    protected static ?string $modelLabel = 'Pestaña de Servicio';

    protected static ?string $pluralModelLabel = 'Pestañas de Servicios';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Información de la Pestaña')
                    ->schema([
                        TextInput::make('tab_name')
                            ->label('Nombre de la pestaña')
                            ->required()
                            ->maxLength(100)
                            ->helperText('Texto que aparece en la pestaña'),

                        TextInput::make('title')
                            ->label('Título del contenido')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Descripción')
                            ->required()
                            ->rows(5)
                            ->helperText('Descripción completa del servicio'),
                    ]),

                Section::make('Características/Items')
                    ->schema([
                        Repeater::make('features')
                            ->label('Lista de características')
                            ->simple(
                                TextInput::make('feature')
                                    ->required()
                                    ->placeholder('Ej: Inspección detallada')
                            )
                            ->defaultItems(0)
                            ->reorderable()
                            ->addActionLabel('Agregar característica'),
                    ]),

                Section::make('Imágenes')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Imagen principal')
                            ->image()
                            ->disk('public')
                            ->directory('services')
                            ->visibility('public')
                            ->imagePreviewHeight('200')
                            ->helperText('Imagen que aparece al lado del texto (560x400 recomendado)'),

                        FileUpload::make('bottom_image')
                            ->label('Imagen inferior (ancho completo)')
                            ->image()
                            ->disk('public')
                            ->directory('services')
                            ->visibility('public')
                            ->imagePreviewHeight('150')
                            ->helperText('Imagen que aparece al final de la pestaña (1440x400 recomendado). Solo para Mantenimiento Preventivo.'),
                    ]),

                Section::make('Configuración')
                    ->schema([
                        Toggle::make('has_button')
                            ->label('Mostrar botón "Solicitar Cotización"')
                            ->default(false)
                            ->helperText('Activa para mostrar el botón que lleva a la página de contacto'),

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
                    ->circular()
                    ->imageSize(50),

                TextColumn::make('tab_name')
                    ->label('Pestaña')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                IconColumn::make('has_button')
                    ->label('Botón')
                    ->boolean(),

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
            'index' => Pages\ListServiceTabs::route('/'),
            'edit' => Pages\EditServiceTab::route('/{record}/edit'),
        ];
    }
}
