<?php

namespace App\Filament\Resources\WhoWeAreSectionResource\Pages;

use App\Filament\Resources\WhoWeAreSectionResource;
use Filament\Resources\Pages\EditRecord;

class EditWhoWeAreSection extends EditRecord
{
    protected static string $resource = WhoWeAreSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
