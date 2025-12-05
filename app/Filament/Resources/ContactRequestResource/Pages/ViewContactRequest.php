<?php

namespace App\Filament\Resources\ContactRequestResource\Pages;

use App\Filament\Resources\ContactRequestResource;
use Filament\Resources\Pages\ViewRecord;

class ViewContactRequest extends ViewRecord
{
    protected static string $resource = ContactRequestResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Marcar como leído cuando se ve
        $this->record->markAsRead();

        return $data;
    }
}
