<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ServicePlan extends Model
{
    use HasContentCache;

    protected $fillable = [
        'name',
        'icon',
        'features',
        'is_popular',
        'popular_arrow_icon',
        'order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public const CACHE_KEY = 'content.service_plans';

    public function scopeForApi(Builder $query): Builder
    {
        return $query->where('is_active', true)
            ->orderBy('order');
    }

    public function getIconUrlAttribute(): ?string
    {
        if (!$this->icon) {
            return null;
        }

        if (str_starts_with($this->icon, 'http')) {
            return $this->icon;
        }

        return url('storage/' . $this->icon);
    }

    public function getPopularArrowIconUrlAttribute(): ?string
    {
        if (!$this->popular_arrow_icon) {
            return null;
        }

        if (str_starts_with($this->popular_arrow_icon, 'http')) {
            return $this->popular_arrow_icon;
        }

        return url('storage/' . $this->popular_arrow_icon);
    }

    public function toApiArray(): array
    {
        return [
            'id' => (string) $this->id,
            'name' => $this->name,
            'icon' => $this->icon_url,
            'features' => $this->features,
            'is_popular' => $this->is_popular,
            'popular_arrow_icon' => $this->popular_arrow_icon_url,
        ];
    }
}
