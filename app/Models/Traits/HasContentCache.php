<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

/**
 * Trait para manejar cache de contenido en modelos
 *
 * Uso: El modelo debe implementar toApiArray() y opcionalmente definir:
 * - CACHE_KEY: string (default: 'content.{table_name}')
 * - CACHE_TTL: int en segundos (default: 3600)
 *
 * @method static Builder forApi()
 */
trait HasContentCache
{
    /**
     * Boot del trait - registra eventos para invalidar cache
     */
    public static function bootHasContentCache(): void
    {
        static::saved(fn() => static::clearCache());
        static::deleted(fn() => static::clearCache());
    }

    /**
     * Obtener la clave de cache del modelo
     */
    public static function getCacheKey(): string
    {
        /** @var string */
        $cacheKey = defined(static::class . '::CACHE_KEY')
            ? constant(static::class . '::CACHE_KEY')
            : 'content.' . (new static())->getTable();

        return $cacheKey;
    }

    /**
     * Obtener el TTL del cache
     */
    public static function getCacheTtl(): int
    {
        /** @var int */
        $ttl = defined(static::class . '::CACHE_TTL')
            ? constant(static::class . '::CACHE_TTL')
            : 3600;

        return $ttl;
    }

    /**
     * Limpiar cache del modelo
     */
    public static function clearCache(): void
    {
        Cache::forget(static::getCacheKey());
    }

    /**
     * Obtener datos con cache
     */
    public static function getCached(): array
    {
        return Cache::remember(
            static::getCacheKey(),
            static::getCacheTtl(),
            function () {
                /** @var Builder $query */
                $query = static::query();

                return $query->forApi()
                    ->get()
                    ->map(fn($item) => $item->toApiArray())
                    ->toArray();
            }
        );
    }

    /**
     * Scope por defecto para API - puede ser sobreescrito en el modelo
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeForApi(Builder $query): Builder
    {
        $fillable = $this->getFillable();

        if (in_array('is_active', $fillable)) {
            $query->where('is_active', true);
        }

        if (in_array('order', $fillable)) {
            $query->orderBy('order');
        }

        return $query;
    }

    /**
     * Transformación para API - debe ser implementado por cada modelo
     *
     * @return array<string, mixed>
     */
    abstract public function toApiArray(): array;
}
