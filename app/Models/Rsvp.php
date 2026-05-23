<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'memorial_page_id',
        'name',
        'attendance',
        'guest_count',
        'note',
    ];

    public function memorialPage(): BelongsTo
    {
        return $this->belongsTo(MemorialPage::class);
    }
}
