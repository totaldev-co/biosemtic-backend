<?php

namespace App\Filament\Resources\CallToActionSectionResource\Pages;

use App\Filament\Resources\CallToActionSectionResource;
use Filament\Resources\Pages\ListRecords;

class ListCallToActionSections extends ListRecords
{
    protected static string $resource = CallToActionSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
