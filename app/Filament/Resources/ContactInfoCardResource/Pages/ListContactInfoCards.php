<?php

namespace App\Filament\Resources\ContactInfoCardResource\Pages;

use App\Filament\Resources\ContactInfoCardResource;
use Filament\Resources\Pages\ListRecords;

class ListContactInfoCards extends ListRecords
{
    protected static string $resource = ContactInfoCardResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
