<?php

namespace App\Filament\Resources\RentalProductResource\Pages;

use App\Filament\Resources\RentalProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRentalProduct extends EditRecord
{
    protected static string $resource = RentalProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Eliminar'),
        ];
    }
}
