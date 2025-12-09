<?php

namespace App\Filament\Resources\ContactFormSectionResource\Pages;

use App\Filament\Resources\ContactFormSectionResource;
use App\Models\SectionSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListContactFormSections extends ListRecords
{
    protected static string $resource = ContactFormSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('editHeaderSection')
                ->label('Editar Header')
                ->icon('heroicon-o-cog-6-tooth')
                ->color('gray')
                ->schema([
                    TextInput::make('title')
                        ->label('Título')
                        ->required()
                        ->maxLength(255),
                    Textarea::make('subtitle')
                        ->label('Subtítulo')
                        ->rows(2)
                        ->maxLength(500),
                ])
                ->fillForm(function (): array {
                    $setting = SectionSetting::where('section_key', 'contact_header')->first();
                    return [
                        'title' => $setting?->title ?? 'Contáctanos',
                        'subtitle' => $setting?->subtitle ?? '',
                    ];
                })
                ->action(function (array $data): void {
                    SectionSetting::updateOrCreate(
                        ['section_key' => 'contact_header'],
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

            Action::make('editFormSection')
                ->label('Editar Título Formulario')
                ->icon('heroicon-o-document-text')
                ->color('gray')
                ->schema([
                    TextInput::make('title')
                        ->label('Título')
                        ->required()
                        ->maxLength(255),
                    Textarea::make('subtitle')
                        ->label('Subtítulo')
                        ->rows(2)
                        ->maxLength(500),
                ])
                ->fillForm(function (): array {
                    $setting = SectionSetting::where('section_key', 'contact_form')->first();
                    return [
                        'title' => $setting?->title ?? '¿Tienes dudas? Contáctanos',
                        'subtitle' => $setting?->subtitle ?? '',
                    ];
                })
                ->action(function (array $data): void {
                    SectionSetting::updateOrCreate(
                        ['section_key' => 'contact_form'],
                        [
                            'title' => $data['title'],
                            'subtitle' => $data['subtitle'],
                        ]
                    );

                    Notification::make()
                        ->title('Título del formulario actualizado')
                        ->success()
                        ->send();
                }),
        ];
    }
}
