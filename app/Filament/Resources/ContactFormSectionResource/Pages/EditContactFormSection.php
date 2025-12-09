<?php

namespace App\Filament\Resources\ContactFormSectionResource\Pages;

use App\Filament\Resources\ContactFormSectionResource;
use Filament\Resources\Pages\EditRecord;

class EditContactFormSection extends EditRecord
{
    protected static string $resource = ContactFormSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
