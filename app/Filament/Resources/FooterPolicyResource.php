<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterPolicyResource\Pages;
use App\Models\FooterPolicy;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class FooterPolicyResource extends Resource
{
    protected static ?string $model = FooterPolicy::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static string|UnitEnum|null $navigationGroup = 'Configuración General';

    protected static ?string $navigationLabel = 'Políticas del Footer';

    protected static ?string $modelLabel = 'Política';

    protected static ?string $pluralModelLabel = 'Políticas del Footer';

    protected static ?int $navigationSort = 103;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Información de la Política')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Nombre que se mostrará en el footer'),

                        FileUpload::make('file_path')
                            ->label('Archivo PDF')
                            ->disk('public')
                            ->directory('site/footer/policies')
                            ->visibility('public')
                            ->acceptedFileTypes(['application/pdf'])
                            ->required()
                            ->helperText('Archivo PDF de la política'),
                    ]),

                Section::make('Configuración')
                    ->schema([
                        TextInput::make('order')
                            ->label('Orden')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),

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
                TextColumn::make('order')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('file_path')
                    ->label('Archivo')
                    ->formatStateUsing(fn($state) => basename($state))
                    ->badge()
                    ->color('info'),

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
                EditAction::make()->label('Editar'),
                DeleteAction::make()->label('Eliminar'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFooterPolicies::route('/'),
            'create' => Pages\CreateFooterPolicy::route('/create'),
            'edit' => Pages\EditFooterPolicy::route('/{record}/edit'),
        ];
    }
}
