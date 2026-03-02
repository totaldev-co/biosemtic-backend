<?php

namespace App\Filament\Resources\ServiceTabResource\Pages;

use App\Filament\Resources\ServiceTabResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditServiceTab extends EditRecord
{
    protected static string $resource = ServiceTabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Eliminar'),
        ];
    }
}
