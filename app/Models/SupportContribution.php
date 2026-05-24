<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupportContribution extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'memorial_page_id',
        'name',
        'phone',
        'nominal',
        'proof_image_path',
    ];

    public function memorialPage(): BelongsTo
    {
        return $this->belongsTo(MemorialPage::class);
    }
}
