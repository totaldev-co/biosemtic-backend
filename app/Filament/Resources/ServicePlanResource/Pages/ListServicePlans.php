<?php

namespace App\Filament\Resources\ServicePlanResource\Pages;

use App\Filament\Resources\ServicePlanResource;
use App\Models\SectionSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListServicePlans extends ListRecords
{
    protected static string $resource = ServicePlanResource::class;

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
                        ->label('Descripción')
                        ->rows(4),
                    Repeater::make('features')
                        ->label('Características')
                        ->simple(
                            TextInput::make('feature')
                                ->required()
                                ->placeholder('Ej: Incluye mantenimiento preventivo...')
                        )
                        ->defaultItems(0)
                        ->reorderable()
                        ->addActionLabel('Agregar característica'),
                ])
                ->fillForm(function (): array {
                    $setting = SectionSetting::where('section_key', 'service_plans')->first();
                    return [
                        'title' => $setting?->title ?? '',
                        'subtitle' => $setting?->subtitle ?? '',
                        'features' => $setting?->features ?? [],
                    ];
                })
                ->action(function (array $data): void {
                    SectionSetting::updateOrCreate(
                        ['section_key' => 'service_plans'],
                        [
                            'title' => $data['title'],
                            'subtitle' => $data['subtitle'],
                            'features' => $data['features'],
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
