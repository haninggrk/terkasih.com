<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

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
        ];
    }

    public function memorialPage(): BelongsTo
    {
        return $this->belongsTo(MemorialPage::class);
    }
}
