<?php

namespace App\Filament\Resources\ServiceItemResource\Pages;

use App\Filament\Resources\ServiceItemResource;
use App\Models\SectionSetting;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListServiceItems extends ListRecords
{
    protected static string $resource = ServiceItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('editHeaderSection')
                ->label('Editar Header')
                ->icon('heroicon-o-cog-6-tooth')
                ->color('gray')
                ->schema([
                    TextInput::make('title')
                        ->label('Título de la sección')
                        ->required()
                        ->maxLength(255),
                    Textarea::make('subtitle')
                        ->label('Subtítulo')
                        ->rows(3)
                        ->maxLength(500),
                ])
                ->fillForm(function (): array {
                    $setting = SectionSetting::where('section_key', 'services_header')->first();
                    return [
                        'title' => $setting?->title ?? 'Servicios',
                        'subtitle' => $setting?->subtitle ?? '',
                    ];
                })
                ->action(function (array $data): void {
                    SectionSetting::updateOrCreate(
                        ['section_key' => 'services_header'],
                        [
                            'title' => $data['title'],
                            'subtitle' => $data['subtitle'],
                        ]
                    );

                    Notification::make()
                        ->title('Header actualizado')
                        ->success()
                        ->send();
                }),

            Action::make('editCustomSection')
                ->label('Editar CTA')
                ->icon('heroicon-o-megaphone')
                ->color('gray')
                ->schema([
                    TextInput::make('title')
                        ->label('Título del CTA')
                        ->required()
                        ->maxLength(255),
                    Textarea::make('subtitle')
                        ->label('Subtítulo')
                        ->rows(2)
                        ->maxLength(500),
                ])
                ->fillForm(function (): array {
                    $setting = SectionSetting::where('section_key', 'services_custom')->first();
                    return [
                        'title' => $setting?->title ?? '¿Necesitas un servicio no listado?',
                        'subtitle' => $setting?->subtitle ?? '',
                    ];
                })
                ->action(function (array $data): void {
                    SectionSetting::updateOrCreate(
                        ['section_key' => 'services_custom'],
                        [
                            'title' => $data['title'],
                            'subtitle' => $data['subtitle'],
                        ]
                    );

                    Notification::make()
                        ->title('CTA actualizado')
                        ->success()
                        ->send();
                }),

            CreateAction::make()
                ->label('Nuevo Servicio'),
        ];
    }
}
