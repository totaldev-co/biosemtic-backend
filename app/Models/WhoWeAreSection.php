<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WhoWeAreSection extends Model
{
    use HasContentCache;

    protected $fillable = [
        'title',
        'description',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public const CACHE_KEY = 'content.who_we_are_section';

    public function stats(): HasMany
    {
        return $this->hasMany(WhoWeAreStat::class)->orderBy('order');
    }

    public function scopeForApi($query)
    {
        return $query->where('is_active', true)->with('stats');
    }

    public function toApiArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image_url,
            'stats' => $this->stats->map(fn($stat) => [
                'value' => $stat->value,
                'label' => $stat->label,
            ])->toArray(),
        ];
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        return asset('storage/' . $this->image);
    }
}
