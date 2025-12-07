<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\SectionSetting;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

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
                    $setting = SectionSetting::where('section_key', 'products_header')->first();
                    return [
                        'title' => $setting?->title ?? 'Productos',
                        'subtitle' => $setting?->subtitle ?? '',
                    ];
                })
                ->action(function (array $data): void {
                    SectionSetting::updateOrCreate(
                        ['section_key' => 'products_header'],
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
            CreateAction::make()
                ->label('Nuevo Producto'),
        ];
    }
}
