<?php

namespace App\Filament\Resources\ExcellenceCards\Pages;

use App\Filament\Resources\ExcellenceCards\ExcellenceCardResource;
use App\Models\SectionSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListExcellenceCards extends ListRecords
{
    protected static string $resource = ExcellenceCardResource::class;

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
                    $setting = SectionSetting::where('section_key', 'excellence')->first();
                    return [
                        'title' => $setting?->title ?? 'Nuestro compromiso es la excelencia',
                    ];
                })
                ->action(function (array $data): void {
                    SectionSetting::updateOrCreate(
                        ['section_key' => 'excellence'],
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
