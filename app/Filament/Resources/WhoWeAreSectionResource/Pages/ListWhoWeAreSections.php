<?php

namespace App\Filament\Resources\WhoWeAreSectionResource\Pages;

use App\Filament\Resources\WhoWeAreSectionResource;
use Filament\Resources\Pages\ListRecords;

class ListWhoWeAreSections extends ListRecords
{
    protected static string $resource = WhoWeAreSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
