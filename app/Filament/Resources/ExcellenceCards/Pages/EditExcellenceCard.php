<?php

namespace App\Filament\Resources\ExcellenceCards\Pages;

use App\Filament\Resources\ExcellenceCards\ExcellenceCardResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExcellenceCard extends EditRecord
{
    protected static string $resource = ExcellenceCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
