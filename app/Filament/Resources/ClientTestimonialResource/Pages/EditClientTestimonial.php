<?php

namespace App\Filament\Resources\ClientTestimonialResource\Pages;

use App\Filament\Resources\ClientTestimonialResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditClientTestimonial extends EditRecord
{
    protected static string $resource = ClientTestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
