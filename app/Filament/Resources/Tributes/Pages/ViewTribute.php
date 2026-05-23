<?php

namespace App\Filament\Resources\Tributes\Pages;

use App\Filament\Resources\Tributes\TributeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTribute extends ViewRecord
{
    protected static string $resource = TributeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
