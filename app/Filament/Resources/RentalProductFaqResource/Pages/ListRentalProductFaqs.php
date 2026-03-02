<?php

namespace App\Filament\Resources\RentalProductFaqResource\Pages;

use App\Filament\Resources\RentalProductFaqResource;
use Filament\Resources\Pages\ListRecords;

class ListRentalProductFaqs extends ListRecords
{
    protected static string $resource = RentalProductFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
