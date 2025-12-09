<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactFormSectionResource\Pages;
use App\Models\ContactFormSection;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class ContactFormSectionResource extends Resource
{
    protected static ?string $model = ContactFormSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static string|UnitEnum|null $navigationGroup = 'Página Contacto';

    protected static ?string $navigationLabel = 'Imagen del Formulario';

    protected static ?string $modelLabel = 'Imagen del Formulario';

    protected static ?string $pluralModelLabel = 'Imagen del Formulario';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Imagen del Formulario de Contacto')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Imagen')
                            ->image()
                            ->disk('public')
                            ->directory('contact')
                            ->visibility('public')
                            ->imagePreviewHeight('300')
                            ->helperText('Imagen que se muestra junto al formulario de contacto'),

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
                    ->imageSize(80),

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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactFormSections::route('/'),
            'edit' => Pages\EditContactFormSection::route('/{record}/edit'),
        ];
    }
}
