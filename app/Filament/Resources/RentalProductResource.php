<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RentalProductResource\Pages;
use App\Models\RentalProduct;
use App\Models\RentalProductCategory;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class RentalProductResource extends Resource
{
    protected static ?string $model = RentalProduct::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-shopping-bag';

    protected static string|UnitEnum|null $navigationGroup = 'Página Servicios';

    protected static ?string $navigationLabel = 'Productos de Alquiler';

    protected static ?string $modelLabel = 'Producto de Alquiler';

    protected static ?string $pluralModelLabel = 'Productos de Alquiler';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Información del Producto')
                    ->schema([
                        Select::make('category_id')
                            ->label('Categoría')
                            ->options(RentalProductCategory::where('is_active', true)->pluck('name', 'id'))
                            ->required()
                            ->searchable()
                            ->preload(),

                        TextInput::make('name')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Descripción')
                            ->required()
                            ->rows(5)
                            ->helperText('Descripción completa del producto'),
                    ]),

                Section::make('Imágenes del Producto')
                    ->schema([
                        Repeater::make('images')
                            ->label('Galería de imágenes')
                            ->relationship()
                            ->schema([
                                FileUpload::make('image_path')
                                    ->label('Imagen')
                                    ->image()
                                    ->disk('public')
                                    ->directory('rental-products/detailed')
                                    ->visibility('public')
                                    ->imagePreviewHeight('150')
                                    ->required(),

                                TextInput::make('alt_text')
                                    ->label('Texto alternativo')
                                    ->placeholder('Descripción de la imagen')
                                    ->maxLength(255),
                            ])
                            ->addActionLabel('Agregar imagen')
                            ->defaultItems(0)
                            ->reorderableWithButtons(false)
                            ->itemLabel(fn(array $state): ?string => $state['alt_text'] ?? 'Imagen'),
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
                ImageColumn::make('images.image_path')
                    ->label('Imagen')
                    ->disk('public')
                    ->limit(1)
                    ->circular()
                    ->stacked(),

                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('category.name')
                    ->label('Categoría')
                    ->badge()
                    ->color('info')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('images_count')
                    ->label('Imágenes')
                    ->counts('images')
                    ->badge()
                    ->color('gray'),

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
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Categoría')
                    ->relationship('category', 'name'),
                SelectFilter::make('is_active')
                    ->label('Estado')
                    ->options([
                        true => 'Activo',
                        false => 'Inactivo',
                    ]),
            ])
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
            'index' => Pages\ListRentalProducts::route('/'),
            'create' => Pages\CreateRentalProduct::route('/create'),
            'edit' => Pages\EditRentalProduct::route('/{record}/edit'),
        ];
    }
}
