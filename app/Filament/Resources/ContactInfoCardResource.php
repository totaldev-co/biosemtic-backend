<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactInfoCardResource\Pages;
use App\Models\ContactInfoCard;
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

class ContactInfoCardResource extends Resource
{
    protected static ?string $model = ContactInfoCard::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-information-circle';

    protected static string|UnitEnum|null $navigationGroup = 'Página Contacto';

    protected static ?string $navigationLabel = 'Tarjetas de Información';

    protected static ?string $modelLabel = 'Tarjeta de Información';

    protected static ?string $pluralModelLabel = 'Tarjetas de Información';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información de la Tarjeta')
                    ->schema([
                        FileUpload::make('icon')
                            ->label('Icono')
                            ->image()
                            ->disk('public')
                            ->directory('contact/info')
                            ->visibility('public')
                            ->imagePreviewHeight('80')
                            ->helperText('Icono de la tarjeta (PNG recomendado)'),

                        TextInput::make('title')
                            ->label('Título')
                            ->required()
                            ->maxLength(255),

                        Repeater::make('text')
                            ->label('Texto (líneas)')
                            ->simple(
                                TextInput::make('line')
                                    ->required()
                                    ->placeholder('Ej: Lunes - Jueves: 7:00am - 5:00pm')
                            )
                            ->defaultItems(1)
                            ->reorderable()
                            ->addActionLabel('Agregar línea'),

                        TextInput::make('detail')
                            ->label('Detalle adicional')
                            ->maxLength(255)
                            ->helperText('Información adicional (ej: email, dirección)'),
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
            'index' => Pages\ListContactInfoCards::route('/'),
            'edit' => Pages\EditContactInfoCard::route('/{record}/edit'),
        ];
    }
}
