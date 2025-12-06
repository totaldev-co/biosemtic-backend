<?php

namespace App\Filament\Resources\CallToActionSectionResource\Pages;

use App\Filament\Resources\CallToActionSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCallToActionSection extends EditRecord
{
    protected static string $resource = CallToActionSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
