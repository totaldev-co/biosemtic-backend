<?php

namespace App\Filament\Resources\ContactInfoResource\Pages;

use App\Filament\Resources\ContactInfoResource;
use Filament\Resources\Pages\ListRecords;

class ListContactInfos extends ListRecords
{
    protected static string $resource = ContactInfoResource::class;
}
