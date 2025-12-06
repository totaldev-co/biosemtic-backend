<?php

namespace App\Filament\Resources\MissionVisionSectionResource\Pages;

use App\Filament\Resources\MissionVisionSectionResource;
use Filament\Resources\Pages\EditRecord;

class EditMissionVisionSection extends EditRecord
{
    protected static string $resource = MissionVisionSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
