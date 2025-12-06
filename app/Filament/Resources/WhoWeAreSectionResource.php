<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WhoWeAreSectionResource\Pages;
use App\Models\WhoWeAreSection;
use BackedEnum;
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
use Filament\Actions\EditAction;
use UnitEnum;

class WhoWeAreSectionResource extends Resource
{
    protected static ?string $model = WhoWeAreSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static string|UnitEnum|null $navigationGroup = 'Nosotros';

    protected static ?string $navigationLabel = 'Quiénes Somos';

    protected static ?string $modelLabel = 'Sección Quiénes Somos';

    protected static ?string $pluralModelLabel = 'Sección Quiénes Somos';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contenido Principal')
                    ->description('Edita el contenido de la sección "Quiénes Somos" de la página Nosotros.')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        TextInput::make('title')
                            ->label('Título')
                            ->required()
                            ->maxLength(255)
                            ->default('¿Quiénes somos?')
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Descripción')
                            ->required()
                            ->rows(5)
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        FileUpload::make('image')
                            ->label('Imagen')
                            ->image()
                            ->disk('public')
                            ->directory('who-we-are')
                            ->visibility('public')
                            ->helperText('Imagen principal de la sección')
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Activo')
                            ->default(true),
                    ]),

                Section::make('Estadísticas')
                    ->description('Configura las estadísticas que se muestran.')
                    ->icon('heroicon-o-chart-bar')
                    ->schema([
                        Repeater::make('stats')
                            ->relationship()
                            ->schema([
                                TextInput::make('value')
                                    ->label('Valor')
                                    ->required()
                                    ->maxLength(20)
                                    ->placeholder('Ej: 12+, 8000+'),

                                TextInput::make('label')
                                    ->label('Etiqueta')
                                    ->required()
                                    ->maxLength(100)
                                    ->placeholder('Ej: Años de experiencia'),

                                TextInput::make('order')
                                    ->label('Orden')
                                    ->numeric()
                                    ->default(0),
                            ])
                            ->columns(3)
                            ->defaultItems(4)
                            ->minItems(4)
                            ->maxItems(4)
                            ->reorderable()
                            ->addable(false)
                            ->deletable(false)
                            ->collapsible()
                            ->itemLabel(fn(array $state): ?string => $state['value'] ?? null),
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
                    ->circular(),

                TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),

                TextColumn::make('stats_count')
                    ->label('Estadísticas')
                    ->counts('stats'),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),

                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Editar'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWhoWeAreSections::route('/'),
            'edit' => Pages\EditWhoWeAreSection::route('/{record}/edit'),
        ];
    }
}
