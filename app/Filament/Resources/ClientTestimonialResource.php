<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientTestimonialResource\Pages;
use App\Models\ClientTestimonial;
use BackedEnum;
use Filament\Actions\CreateAction;
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

class ClientTestimonialResource extends Resource
{
    protected static ?string $model = ClientTestimonial::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static string|UnitEnum|null $navigationGroup = 'Nosotros';

    protected static ?string $navigationLabel = 'Testimonios Clientes';

    protected static ?string $modelLabel = 'Testimonio de Cliente';

    protected static ?string $pluralModelLabel = 'Testimonios de Clientes';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Cliente')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('position')
                            ->label('Cargo / Posición')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Descripción / Testimonio')
                            ->required()
                            ->rows(3)
                            ->maxLength(500),

                        FileUpload::make('image')
                            ->label('Foto')
                            ->image()
                            ->disk('public')
                            ->directory('testimonials')
                            ->visibility('public')
                            ->helperText('Foto del cliente (recomendado: 400x500px)'),
                    ]),

                Section::make('Redes Sociales')
                    ->description('URLs de las redes sociales del cliente (opcional)')
                    ->schema([
                        TextInput::make('twitter_url')
                            ->label('Twitter / X')
                            ->url()
                            ->maxLength(500)
                            ->placeholder('https://twitter.com/usuario'),

                        TextInput::make('linkedin_url')
                            ->label('LinkedIn')
                            ->url()
                            ->maxLength(500)
                            ->placeholder('https://linkedin.com/in/usuario'),

                        TextInput::make('dribbble_url')
                            ->label('Dribbble')
                            ->url()
                            ->maxLength(500)
                            ->placeholder('https://dribbble.com/usuario'),
                    ])
                    ->columns(3),

                Section::make('Configuración')
                    ->schema([
                        TextInput::make('order')
                            ->label('Orden')
                            ->numeric()
                            ->default(0)
                            ->required(),

                        Toggle::make('is_active')
                            ->label('Activo')
                            ->default(false)
                            ->helperText('Activar para mostrar en la página'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Foto')
                    ->disk('public')
                    ->circular(),

                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('position')
                    ->label('Cargo')
                    ->limit(30),

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
                DeleteAction::make()
                    ->label('Eliminar'),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Nuevo Testimonio'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClientTestimonials::route('/'),
            'create' => Pages\CreateClientTestimonial::route('/create'),
            'edit' => Pages\EditClientTestimonial::route('/{record}/edit'),
        ];
    }
}
