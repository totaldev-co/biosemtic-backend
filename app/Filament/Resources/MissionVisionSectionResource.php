<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MissionVisionSectionResource\Pages;
use App\Models\MissionVisionSection;
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

class MissionVisionSectionResource extends Resource
{
    protected static ?string $model = MissionVisionSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-flag';

    protected static string|UnitEnum|null $navigationGroup = 'Página Nosotros';

    protected static ?string $navigationLabel = 'Misión y Visión';

    protected static ?string $modelLabel = 'Sección Misión y Visión';

    protected static ?string $pluralModelLabel = 'Sección Misión y Visión';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Imagen de Fondo')
                    ->description('Imagen que se muestra de fondo en la sección.')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('background_image')
                            ->label('Imagen de fondo')
                            ->image()
                            ->disk('public')
                            ->directory('mission-vision')
                            ->visibility('public')
                            ->helperText('Imagen de fondo de la sección (recomendado: 1920x600px)')
                            ->columnSpanFull(),
                    ]),

                Section::make('Misión')
                    ->description('Contenido de la tarjeta de misión.')
                    ->icon('heroicon-o-clipboard-document-list')
                    ->schema([
                        TextInput::make('mission_title')
                            ->label('Título')
                            ->required()
                            ->maxLength(100)
                            ->default('Nuestra misión'),

                        Textarea::make('mission_text')
                            ->label('Texto')
                            ->required()
                            ->rows(4)
                            ->maxLength(1000),
                    ]),

                Section::make('Visión')
                    ->description('Contenido de la tarjeta de visión.')
                    ->icon('heroicon-o-eye')
                    ->schema([
                        TextInput::make('vision_title')
                            ->label('Título')
                            ->required()
                            ->maxLength(100)
                            ->default('Nuestra visión'),

                        Textarea::make('vision_text')
                            ->label('Texto')
                            ->required()
                            ->rows(4)
                            ->maxLength(1000),
                    ]),

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
                ImageColumn::make('background_image')
                    ->label('Imagen')
                    ->disk('public')
                    ->circular(),

                TextColumn::make('mission_title')
                    ->label('Misión')
                    ->limit(30),

                TextColumn::make('vision_title')
                    ->label('Visión')
                    ->limit(30),

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
            'index' => Pages\ListMissionVisionSections::route('/'),
            'edit' => Pages\EditMissionVisionSection::route('/{record}/edit'),
        ];
    }
}
