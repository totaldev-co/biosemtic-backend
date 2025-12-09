<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactRequestResource\Pages;
use App\Models\ContactRequest;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class ContactRequestResource extends Resource
{
    protected static ?string $model = ContactRequest::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-inbox';

    protected static string|UnitEnum|null $navigationGroup = null;

    protected static ?string $navigationLabel = 'Solicitudes de Contacto';

    protected static ?string $modelLabel = 'Solicitud';

    protected static ?string $pluralModelLabel = 'Solicitudes de Contacto';

    protected static ?int $navigationSort = 0;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Contacto')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre')
                            ->disabled(),

                        TextInput::make('email')
                            ->label('Correo')
                            ->disabled(),

                        TextInput::make('phone')
                            ->label('Teléfono')
                            ->disabled(),

                        TextInput::make('company')
                            ->label('Empresa')
                            ->disabled(),
                    ])
                    ->columns(2),

                Section::make('Mensaje')
                    ->schema([
                        TextInput::make('subject')
                            ->label('Asunto')
                            ->disabled(),

                        Textarea::make('message')
                            ->label('Mensaje')
                            ->disabled()
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),

                Section::make('Gestión')
                    ->schema([
                        Select::make('status')
                            ->label('Estado')
                            ->options([
                                'pending' => 'Pendiente',
                                'read' => 'Leído',
                                'replied' => 'Respondido',
                                'archived' => 'Archivado',
                            ])
                            ->required(),

                        Textarea::make('notes')
                            ->label('Notas internas')
                            ->rows(3)
                            ->helperText('Notas para uso interno')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Correo')
                    ->searchable(),

                TextColumn::make('subject')
                    ->label('Asunto')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'consulta' => 'Consulta',
                        'cotizacion' => 'Cotización',
                        'soporte' => 'Soporte técnico',
                        'otro' => 'Otro',
                        default => $state,
                    }),

                TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'pending' => 'Pendiente',
                        'read' => 'Leído',
                        'replied' => 'Respondido',
                        'archived' => 'Archivado',
                        default => $state,
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'read' => 'info',
                        'replied' => 'success',
                        'archived' => 'gray',
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Recibido')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Estado')
                    ->options([
                        'pending' => 'Pendiente',
                        'read' => 'Leído',
                        'replied' => 'Respondido',
                        'archived' => 'Archivado',
                    ]),
                SelectFilter::make('subject')
                    ->label('Asunto')
                    ->options([
                        'consulta' => 'Consulta',
                        'cotizacion' => 'Cotización',
                        'soporte' => 'Soporte técnico',
                        'otro' => 'Otro',
                    ]),
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('Ver'),
                Action::make('markAsRead')
                    ->label('Marcar leído')
                    ->icon('heroicon-o-check')
                    ->color('info')
                    ->action(fn(ContactRequest $record) => $record->markAsRead())
                    ->visible(fn(ContactRequest $record) => $record->status === 'pending'),
                Action::make('markAsReplied')
                    ->label('Marcar respondido')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->action(fn(ContactRequest $record) => $record->markAsReplied())
                    ->visible(fn(ContactRequest $record) => in_array($record->status, ['pending', 'read'])),
                Action::make('archive')
                    ->label('Archivar')
                    ->icon('heroicon-o-archive-box')
                    ->color('gray')
                    ->action(fn(ContactRequest $record) => $record->archive())
                    ->visible(fn(ContactRequest $record) => $record->status !== 'archived'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactRequests::route('/'),
            'view' => Pages\ViewContactRequest::route('/{record}'),
            'edit' => Pages\EditContactRequest::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
