<?php

namespace App\Filament\Resources\SupportContributions\Pages;

use App\Filament\Resources\SupportContributions\SupportContributionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSupportContributions extends ListRecords
{
    protected static string $resource = SupportContributionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
