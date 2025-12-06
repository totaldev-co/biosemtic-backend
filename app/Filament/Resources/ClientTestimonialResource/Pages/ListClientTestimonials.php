<?php

namespace App\Filament\Resources\ClientTestimonialResource\Pages;

use App\Filament\Resources\ClientTestimonialResource;
use App\Models\SectionSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListClientTestimonials extends ListRecords
{
    protected static string $resource = ClientTestimonialResource::class;

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
                ])
                ->fillForm(function (): array {
                    $setting = SectionSetting::where('section_key', 'client_testimonials')->first();
                    return [
                        'title' => $setting?->title ?? 'Nuestros clientes',
                    ];
                })
                ->action(function (array $data): void {
                    SectionSetting::updateOrCreate(
                        ['section_key' => 'client_testimonials'],
                        [
                            'title' => $data['title'],
                            'subtitle' => null,
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
