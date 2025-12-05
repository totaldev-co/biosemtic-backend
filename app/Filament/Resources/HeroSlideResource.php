<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSlideResource\Pages;
use App\Models\HeroSlide;
use BackedEnum;
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
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use UnitEnum;

class HeroSlideResource extends Resource
{
    protected static ?string $model = HeroSlide::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static string|UnitEnum|null $navigationGroup = 'Home';

    protected static ?string $navigationLabel = 'Hero Slides';

    protected static ?string $modelLabel = 'Slide del Hero';

    protected static ?string $pluralModelLabel = 'Slides del Hero';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contenido del Slide')
                    ->description('Edita el contenido que se mostrará en el slide del hero.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Título')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Especialistas en equipos médicos')
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Descripción')
                            ->required()
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('Ej: Contamos con las mejores marcas, equipos y tecnología...')
                            ->columnSpanFull(),

                        FileUpload::make('image')
                            ->label('Imagen de fondo')
                            ->image()
                            ->required()
                            ->disk('public')
                            ->visibility('public')
                            ->helperText('Recomendado: 1920x1080px, formato JPG o PNG')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Botón de acción')
                    ->description('Configura el texto y enlace del botón.')
                    ->schema([
                        TextInput::make('button_text')
                            ->label('Texto del botón')
                            ->required()
                            ->maxLength(50)
                            ->default('Contáctanos Ahora'),

                        TextInput::make('button_url')
                            ->label('URL del botón')
                            ->required()
                            ->url()
                            ->maxLength(500)
                            ->default('https://api.whatsapp.com/send/?phone=573185277390&text&type=phone_number&app_absent=0&wame_ctl=1')
                            ->helperText('URL completa incluyendo https://'),
                    ])
                    ->columns(2),

                Section::make('Configuración')
                    ->schema([
                        TextInput::make('order')
                            ->label('Orden')
                            ->numeric()
                            ->default(0)
                            ->required()
                            ->helperText('Los slides se muestran de menor a mayor'),

                        Toggle::make('is_active')
                            ->label('Activo')
                            ->default(true)
                            ->helperText('Solo los slides activos se muestran en el sitio'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Imagen')
                    ->disk('public')
                    ->imageHeight(60)
                    ->imageWidth(100),

                TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                TextColumn::make('description')
                    ->label('Descripción')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('order')
                    ->label('Orden')
                    ->sortable()
                    ->badge()
                    ->color('gray'),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Estado')
                    ->boolean()
                    ->trueLabel('Solo activos')
                    ->falseLabel('Solo inactivos')
                    ->native(false),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Editar'),
            ])
            ->defaultSort('order', 'asc')
            ->reorderable('order');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHeroSlides::route('/'),
            'edit' => Pages\EditHeroSlide::route('/{record}/edit'),
        ];
    }

    // Deshabilitamos la creación de nuevos slides
    public static function canCreate(): bool
    {
        return false;
    }
}
