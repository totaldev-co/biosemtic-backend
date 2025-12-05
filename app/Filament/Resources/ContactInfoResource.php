<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactInfoResource\Pages;
use App\Models\ContactInfo;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class ContactInfoResource extends Resource
{
    protected static ?string $model = ContactInfo::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-phone';

    protected static string|UnitEnum|null $navigationGroup = 'Home';

    protected static ?string $navigationLabel = 'Info de Contacto';

    protected static ?string $modelLabel = 'Información de Contacto';

    protected static ?string $pluralModelLabel = 'Información de Contacto';

    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Encabezado')
                    ->description('Textos principales de la sección de contacto')
                    ->schema([
                        TextInput::make('title')
                            ->label('Título')
                            ->required()
                            ->maxLength(255)
                            ->default('¿Tienes dudas? Contáctanos'),

                        Textarea::make('subtitle')
                            ->label('Subtítulo')
                            ->required()
                            ->rows(2)
                            ->maxLength(500)
                            ->default('Atendemos tu solicitud, brindamos asesoría especializada'),
                    ]),

                Section::make('Información de Contacto')
                    ->schema([
                        TextInput::make('email')
                            ->label('Correo electrónico')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        TextInput::make('phone')
                            ->label('Teléfono')
                            ->required()
                            ->maxLength(50),

                        TextInput::make('address')
                            ->label('Dirección')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('schedule')
                            ->label('Horarios')
                            ->rows(3)
                            ->helperText('Usa saltos de línea para separar los horarios'),
                    ])
                    ->columns(2),

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
                TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email'),

                TextColumn::make('phone')
                    ->label('Teléfono'),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),

                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->actions([
                EditAction::make()
                    ->label('Editar'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactInfos::route('/'),
            'edit' => Pages\EditContactInfo::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
