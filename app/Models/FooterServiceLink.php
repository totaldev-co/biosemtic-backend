<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class FooterServiceLink extends Model
{
    protected $fillable = [
        'label',
        'url',
        'badge',
        'order',
        'is_active',
    ];

    protected $casts = [
        'order' => 'integer',
        'is_active' => 'boolean',
    ];

    public const CACHE_KEY = 'footer_service_links';
    public const CACHE_TTL = 3600;

    /**
     * Obtener links de servicios activos cacheados
     */
    public static function getCached(): array
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return self::where('is_active', true)
                ->orderBy('order')
                ->get()
                ->map(fn($link) => [
                    'label' => $link->label,
                    'url' => $link->url,
                    'badge' => $link->badge,
                ])
                ->toArray();
        });
    }

    public static function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    protected static function booted(): void
    {
        static::saved(fn() => self::clearCache());
        static::deleted(fn() => self::clearCache());
    }
}
