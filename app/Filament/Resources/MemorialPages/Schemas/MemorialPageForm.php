<?php

namespace App\Filament\Resources\MemorialPages\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MemorialPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero')
                    ->schema([
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        TextInput::make('person_name')
                            ->required()
                            ->maxLength(255),
                        DatePicker::make('birth_date'),
                        DatePicker::make('death_date'),
                        TextInput::make('subtitle')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('verse_reference')
                            ->maxLength(255),
                        Textarea::make('verse_text_id')
                            ->required()
                            ->rows(3),
                        Textarea::make('verse_text_en')
                            ->required()
                            ->rows(3),
                        Textarea::make('description_id')
                            ->required()
                            ->rows(3),
                        Textarea::make('description_en')
                            ->required()
                            ->rows(3),
                    ])->columns(2),

                Section::make('Family')
                    ->schema([
                        TextInput::make('wife_name')
                            ->maxLength(255),
                        TagsInput::make('children')
                            ->separator(',')
                            ->placeholder('Type child name and press enter'),
                        TextInput::make('father_in_law')
                            ->maxLength(255),
                        TextInput::make('mother_in_law')
                            ->maxLength(255),
                    ])->columns(2),

                Section::make('Funeral & Support')
                    ->schema([
                        TextInput::make('funeral_resting_place')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('burial_information')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('schedule_closing_coffin')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('schedule_comfort_service')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('schedule_departure_service')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('support_intro_id')
                            ->required()
                            ->rows(2),
                        Textarea::make('support_intro_en')
                            ->required()
                            ->rows(2),
                        TextInput::make('support_account_placeholder')
                            ->required()
                            ->maxLength(255),
                        Toggle::make('is_active')
                            ->default(true),
                    ])->columns(2),
            ]);
    }
}
