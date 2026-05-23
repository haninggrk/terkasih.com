<?php

namespace App\Filament\Resources\SupportContributions\Schemas;

use App\Models\MemorialPage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SupportContributionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('memorial_page_id')
                    ->label('Memorial Page')
                    ->options(MemorialPage::query()->pluck('person_name', 'id'))
                    ->required()
                    ->searchable(),
                TextInput::make('name')
                    ->required()
                    ->maxLength(120),
                TextInput::make('nominal')
                    ->numeric()
                    ->required(),
                FileUpload::make('proof_image_path')
                    ->disk('public')
                    ->directory('memorial/supports')
                    ->image(),
            ]);
    }
}
