<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ServiceTab extends Model
{
    use HasContentCache;

    protected $fillable = [
        'slug',
        'tab_name',
        'title',
        'description',
        'features',
        'image',
        'bottom_image',
        'has_button',
        'order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'has_button' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public const CACHE_KEY = 'content.service_tabs';

    public function scopeForApi(Builder $query): Builder
    {
        return $query->where('is_active', true)
            ->orderBy('order');
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        return url('storage/' . $this->image);
    }

    public function getBottomImageUrlAttribute(): ?string
    {
        if (!$this->bottom_image) {
            return null;
        }

        if (str_starts_with($this->bottom_image, 'http')) {
            return $this->bottom_image;
        }

        return url('storage/' . $this->bottom_image);
    }

    public function toApiArray(): array
    {
        return [
            'id' => (string) $this->id,
            'slug' => $this->slug,
            'tab_name' => $this->tab_name,
            'title' => $this->title,
            'description' => $this->description,
            'features' => $this->features,
            'image' => $this->image_url,
            'bottom_image' => $this->bottom_image_url,
            'has_button' => $this->has_button,
        ];
    }
}
