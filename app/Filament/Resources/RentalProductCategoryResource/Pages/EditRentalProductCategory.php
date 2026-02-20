<?php

namespace App\Filament\Resources\RentalProductCategoryResource\Pages;

use App\Filament\Resources\RentalProductCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRentalProductCategory extends EditRecord
{
    protected static string $resource = RentalProductCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Eliminar'),
        ];
    }
}
