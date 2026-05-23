<?php

namespace App\Filament\Resources\MemorialPages\Pages;

use App\Filament\Resources\MemorialPages\MemorialPageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMemorialPage extends ViewRecord
{
    protected static string $resource = MemorialPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
