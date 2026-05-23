<?php

namespace App\Filament\Resources\SupportContributions\Pages;

use App\Filament\Resources\SupportContributions\SupportContributionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSupportContribution extends EditRecord
{
    protected static string $resource = SupportContributionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
