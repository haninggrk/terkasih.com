<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tribute extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'memorial_page_id',
        'name',
        'relations',
        'message',
        'photos',
        'is_highlighted',
        'sort_order',
        'is_hidden',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'relations' => 'array',
            'photos' => 'array',
            'is_highlighted' => 'boolean',
            'is_hidden' => 'boolean',
        ];
    }

    public function memorialPage(): BelongsTo
    {
        return $this->belongsTo(MemorialPage::class);
    }
}
