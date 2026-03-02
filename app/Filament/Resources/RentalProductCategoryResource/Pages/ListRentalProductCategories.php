<?php

namespace App\Filament\Resources\RentalProductCategoryResource\Pages;

use App\Filament\Resources\RentalProductCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRentalProductCategories extends ListRecords
{
    protected static string $resource = RentalProductCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nueva Categoría'),
        ];
    }
}
