<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SectionSetting extends Model
{
    protected $fillable = [
        'section_key',
        'title',
        'subtitle',
    ];

    public const CACHE_KEY = 'section_settings';
    public const CACHE_TTL = 3600;

    /**
     * Obtener configuración de una sección por su key
     */
    public static function getByKey(string $key): ?array
    {
        $settings = self::getAllCached();
        return $settings[$key] ?? null;
    }

    /**
     * Obtener todas las configuraciones cacheadas indexadas por key
     */
    public static function getAllCached(): array
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return self::all()
                ->keyBy('section_key')
                ->map(fn($s) => [
                    'title' => $s->title,
                    'subtitle' => $s->subtitle,
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
