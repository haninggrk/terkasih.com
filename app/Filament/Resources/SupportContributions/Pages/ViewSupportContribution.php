<?php

namespace App\Filament\Resources\SupportContributions\Pages;

use App\Filament\Resources\SupportContributions\SupportContributionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSupportContribution extends ViewRecord
{
    protected static string $resource = SupportContributionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
