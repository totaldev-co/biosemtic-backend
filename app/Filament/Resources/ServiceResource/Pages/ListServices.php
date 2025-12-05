<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Models\SectionSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListServices extends ListRecords
{
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('editSectionTitle')
                ->label('Editar título de sección')
                ->icon('heroicon-o-cog-6-tooth')
                ->color('gray')
                ->form([
                    TextInput::make('title')
                        ->label('Título de la sección')
                        ->required()
                        ->maxLength(255),
                    Textarea::make('subtitle')
                        ->label('Subtítulo')
                        ->rows(2)
                        ->maxLength(500),
                ])
                ->fillForm(function (): array {
                    $setting = SectionSetting::where('section_key', 'services')->first();
                    return [
                        'title' => $setting?->title ?? 'Lo que ofrecemos',
                        'subtitle' => $setting?->subtitle ?? '',
                    ];
                })
                ->action(function (array $data): void {
                    SectionSetting::updateOrCreate(
                        ['section_key' => 'services'],
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
