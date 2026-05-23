<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class SupportContribution extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'memorial_page_id',
        'name',
        'nominal',
        'proof_image_path',
    ];

    public function memorialPage(): BelongsTo
    {
        return $this->belongsTo(MemorialPage::class);
    }
}
