<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductFaqResource\Pages;
use App\Models\ProductFaq;
use BackedEnum;
use Filament\Actions\DeleteAction;
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

class ProductFaqResource extends Resource
{
    protected static ?string $model = ProductFaq::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static string|UnitEnum|null $navigationGroup = 'Productos';

    protected static ?string $navigationLabel = 'Preguntas Frecuentes';

    protected static ?string $modelLabel = 'Pregunta Frecuente';

    protected static ?string $pluralModelLabel = 'Preguntas Frecuentes de Productos';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Información de la Pregunta')
                    ->schema([
                        FileUpload::make('icon')
                            ->label('Icono')
                            ->image()
                            ->disk('public')
                            ->directory('products/questions')
                            ->visibility('public')
                            ->imagePreviewHeight('100')
                            ->helperText('Icono de la pregunta (PNG recomendado)'),

                        TextInput::make('title')
                            ->label('Pregunta')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('¿Cómo puedo solicitar una demostración?'),

                        Textarea::make('text')
                            ->label('Respuesta')
                            ->required()
                            ->rows(5)
                            ->placeholder('Escribe la respuesta detallada aquí...'),
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
                    ->size(40),

                TextColumn::make('title')
                    ->label('Pregunta')
                    ->searchable()
                    ->sortable()
                    ->limit(60),

                TextColumn::make('text')
                    ->label('Respuesta')
                    ->limit(50)
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
            ->recordActions([
                EditAction::make()
                    ->label('Editar'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductFaqs::route('/'),
            'edit' => Pages\EditProductFaq::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }
}
