<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasContentCache;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'items',
        'link_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'items' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public const CACHE_KEY = 'content.services';

    public function toApiArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'icon' => $this->icon_url,
            'items' => $this->items ?? [],
            'link_url' => $this->link_url,
        ];
    }

    public function getIconUrlAttribute(): ?string
    {
        if (!$this->icon) {
            return null;
        }

        if (str_starts_with($this->icon, 'http')) {
            return $this->icon;
        }

        return asset('storage/' . $this->icon);
    }
}
