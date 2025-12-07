<?php

namespace App\Filament\Resources\ProductFaqResource\Pages;

use App\Filament\Resources\ProductFaqResource;
use App\Models\SectionSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListProductFaqs extends ListRecords
{
    protected static string $resource = ProductFaqResource::class;

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
                        ->label('Subtítulo')
                        ->rows(2)
                        ->maxLength(500),
                ])
                ->fillForm(function (): array {
                    $setting = SectionSetting::where('section_key', 'product_faqs')->first();
                    return [
                        'title' => $setting?->title ?? 'Preguntas Frecuentes',
                        'subtitle' => $setting?->subtitle ?? '',
                    ];
                })
                ->action(function (array $data): void {
                    SectionSetting::updateOrCreate(
                        ['section_key' => 'product_faqs'],
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
