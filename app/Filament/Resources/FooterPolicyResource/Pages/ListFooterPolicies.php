<?php

namespace App\Filament\Resources\FooterPolicyResource\Pages;

use App\Filament\Resources\FooterPolicyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFooterPolicies extends ListRecords
{
    protected static string $resource = FooterPolicyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nueva Política'),
        ];
    }
}
