<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ProductFaq extends Model
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

    public const CACHE_KEY = 'content.product_faqs';

    /**
     * Scope para API - solo FAQs activas ordenadas
     */
    public function scopeForApi(Builder $query): Builder
    {
        return $query->where('is_active', true)
            ->orderBy('order')
            ->orderBy('id');
    }

    /**
     * URL completa del icono
     */
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

    /**
     * Formato para API
     */
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
