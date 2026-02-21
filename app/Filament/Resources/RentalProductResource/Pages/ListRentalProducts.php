<?php

namespace App\Filament\Resources\RentalProductResource\Pages;

use App\Filament\Resources\RentalProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRentalProducts extends ListRecords
{
    protected static string $resource = RentalProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nuevo Producto'),
        ];
    }
}
