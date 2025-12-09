<?php

namespace App\Filament\Resources\ContactInfoCardResource\Pages;

use App\Filament\Resources\ContactInfoCardResource;
use Filament\Resources\Pages\EditRecord;

class EditContactInfoCard extends EditRecord
{
    protected static string $resource = ContactInfoCardResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
