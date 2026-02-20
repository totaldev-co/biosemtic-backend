<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class RentalProductFaq extends Model
{
    use HasContentCache;

    protected $fillable = [
        'icon',
        'title',
        'text',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public const CACHE_KEY = 'content.rental_product_faqs';

    public function scopeForApi(Builder $query): Builder
    {
        return $query->where('is_active', true)
            ->orderBy('order')
            ->orderBy('id');
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

    public function toApiArray(): array
    {
        return [
            'id' => $this->id,
            'icon' => $this->icon_url,
            'title' => $this->title,
            'text' => $this->text,
        ];
    }
}
