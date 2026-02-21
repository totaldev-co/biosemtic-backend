<?php

namespace App\Filament\Resources\ServiceTabResource\Pages;

use App\Filament\Resources\ServiceTabResource;
use Filament\Resources\Pages\ListRecords;

class ListServiceTabs extends ListRecords
{
    protected static string $resource = ServiceTabResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
