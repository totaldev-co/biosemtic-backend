<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class NavigationItem extends Model
{
    protected $fillable = [
        'name',
        'label',
        'path',
        'order',
        'is_active',
    ];

    protected $casts = [
        'order' => 'integer',
        'is_active' => 'boolean',
    ];

    public const CACHE_KEY = 'navigation_items';
    public const CACHE_TTL = 3600;

    /**
     * Obtener items de navegación activos cacheados
     */
    public static function getCached(): array
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return self::where('is_active', true)
                ->orderBy('order')
                ->get()
                ->map(fn($item) => [
                    'name' => $item->name,
                    'label' => $item->label,
                    'path' => $item->path,
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
