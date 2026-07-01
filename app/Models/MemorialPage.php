<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MemorialPage extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'slug',
        'person_name',
        'birth_date',
        'death_date',
        'subtitle',
        'verse_reference',
        'verse_text_id',
        'verse_text_en',
        'description_id',
        'description_en',
        'wife_name',
        'children',
        'father_in_law',
        'mother_in_law',
        'father_name',
        'mother_name',
        'sibling_name',
        'funeral_resting_place',
        'burial_information',
        'schedule_closing_coffin',
        'schedule_comfort_service',
        'schedule_departure_service',
        'support_intro_id',
        'support_intro_en',
        'support_account_placeholder',
        'is_active',
        'support_hidden',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'death_date' => 'date',
            'children' => 'array',
            'is_active' => 'boolean',
            'support_hidden' => 'boolean',
        ];
    }

    public function tributes(): HasMany
    {
        return $this->hasMany(Tribute::class);
    }

    public function supportContributions(): HasMany
    {
        return $this->hasMany(SupportContribution::class);
    }

    public function rsvps(): HasMany
    {
        return $this->hasMany(Rsvp::class);
    }
}
