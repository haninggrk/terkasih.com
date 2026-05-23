<?php

namespace App\Filament\Resources\Tributes\Schemas;

use App\Models\MemorialPage;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TributeForm
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
                CheckboxList::make('relations')
                    ->options([
                        'Teman' => 'Teman',
                        'Saudara' => 'Saudara',
                        'Rekan kerja' => 'Rekan kerja',
                        'Tetangga' => 'Tetangga',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->columns(2)
                    ->required(),
                Textarea::make('message')
                    ->required()
                    ->rows(4),
                FileUpload::make('photos')
                    ->disk('public')
                    ->directory('memorial/tributes')
                    ->image()
                    ->multiple()
                    ->maxFiles(3),
                Toggle::make('is_highlighted')
                    ->default(false),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }
}
