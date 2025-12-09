<?php

namespace App\Filament\Resources\ContactRequestResource\Pages;

use App\Filament\Resources\ContactRequestResource;
use Filament\Resources\Pages\EditRecord;

class ViewContactRequest extends EditRecord
{
    protected static string $resource = ContactRequestResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Marcar como leído cuando se ve
        $this->record->markAsRead();

        return $data;
    }

    public function getTitle(): string
    {
        return 'Ver Solicitud';
    }
}
