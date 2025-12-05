<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutStat extends Model
{
    protected $fillable = [
        'about_section_id',
        'value',
        'label',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public function aboutSection(): BelongsTo
    {
        return $this->belongsTo(AboutSection::class);
    }

    protected static function booted(): void
    {
        // Invalidar cache del padre cuando se modifica un stat
        static::saved(fn($stat) => AboutSection::clearCache());
        static::deleted(fn($stat) => AboutSection::clearCache());
    }
}
