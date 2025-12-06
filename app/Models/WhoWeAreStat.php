<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WhoWeAreStat extends Model
{
    protected $fillable = [
        'who_we_are_section_id',
        'value',
        'label',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public function whoWeAreSection(): BelongsTo
    {
        return $this->belongsTo(WhoWeAreSection::class);
    }

    protected static function booted(): void
    {
        static::saved(fn($stat) => WhoWeAreSection::clearCache());
        static::deleted(fn($stat) => WhoWeAreSection::clearCache());
    }
}
