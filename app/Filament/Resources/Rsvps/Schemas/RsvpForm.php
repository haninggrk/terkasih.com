<?php

namespace App\Filament\Resources\Rsvps\Schemas;

use App\Models\MemorialPage;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RsvpForm
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
                Select::make('attendance')
                    ->options([
                        'yes' => 'Hadir',
                        'maybe' => 'Mungkin Hadir',
                        'no' => 'Tidak Hadir',
                    ])
                    ->required(),
                TextInput::make('guest_count')
                    ->numeric()
                    ->default(1)
                    ->required(),
                TextInput::make('note')
                    ->maxLength(500),
            ]);
    }
}
