<?php

namespace App\Filament\Resources\SupportContributions;

use App\Filament\Resources\SupportContributions\Pages\CreateSupportContribution;
use App\Filament\Resources\SupportContributions\Pages\EditSupportContribution;
use App\Filament\Resources\SupportContributions\Pages\ListSupportContributions;
use App\Filament\Resources\SupportContributions\Pages\ViewSupportContribution;
use App\Filament\Resources\SupportContributions\Schemas\SupportContributionForm;
use App\Filament\Resources\SupportContributions\Schemas\SupportContributionInfolist;
use App\Filament\Resources\SupportContributions\Tables\SupportContributionsTable;
use App\Models\SupportContribution;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SupportContributionResource extends Resource
{
    protected static ?string $model = SupportContribution::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Support Contributions';

    public static function form(Schema $schema): Schema
    {
        return SupportContributionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SupportContributionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SupportContributionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSupportContributions::route('/'),
            'create' => CreateSupportContribution::route('/create'),
            'view' => ViewSupportContribution::route('/{record}'),
            'edit' => EditSupportContribution::route('/{record}/edit'),
        ];
    }
}
