<?php

namespace App\Filament\Resources\ContactInfoResource\Pages;

use App\Filament\Resources\ContactInfoResource;
use App\Models\SectionSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListContactInfos extends ListRecords
{
    protected static string $resource = ContactInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('editSectionTitle')
                ->label('Editar título de sección')
                ->icon('heroicon-o-cog-6-tooth')
                ->color('gray')
                ->schema([
                    TextInput::make('title')
                        ->label('Título de la sección')
                        ->required()
                        ->maxLength(255),
                    Textarea::make('subtitle')
                        ->label('Subtítulo de la sección')
                        ->required()
                        ->rows(2)
                        ->maxLength(500),
                ])
                ->fillForm(function (): array {
                    $setting = SectionSetting::where('section_key', 'contact_info')->first();
                    return [
                        'title' => $setting?->title ?? '¿Tienes dudas? Contáctanos',
                        'subtitle' => $setting?->subtitle ?? 'Atendemos tu solicitud, brindamos asesoría especializada',
                    ];
                })
                ->action(function (array $data): void {
                    SectionSetting::updateOrCreate(
                        ['section_key' => 'contact_info'],
                        [
                            'title' => $data['title'],
                            'subtitle' => $data['subtitle'],
                        ]
                    );

                    Notification::make()
                        ->title('Configuración guardada')
                        ->success()
                        ->send();
                }),
        ];
    }
}
