<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SectionConfig extends Model
{
    use HasContentCache;

    protected $fillable = [
        'section_key',
        'title',
        'subtitle',
        'description',
        'background_image',
        'extra_data',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'extra_data' => 'array',
    ];

    protected static string $cacheKey = 'section_configs_content';

    /**
     * Obtener configuración de una sección específica por su key
     */
    public static function getByKey(string $key): ?array
    {
        $configs = self::getCached();

        foreach ($configs as $config) {
            if ($config['section_key'] === $key) {
                return $config;
            }
        }

        return null;
    }

    /**
     * Obtener todas las configuraciones indexadas por section_key
     */
    public static function getAllByKey(): array
    {
        $configs = self::getCached();
        $indexed = [];

        foreach ($configs as $config) {
            $indexed[$config['section_key']] = $config;
        }

        return $indexed;
    }

    public function scopeForApi($query)
    {
        return $query->where('is_active', true);
    }

    public function toApiArray(): array
    {
        return [
            'id' => $this->id,
            'section_key' => $this->section_key,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'description' => $this->description,
            'background_image' => $this->background_image ? asset('storage/' . $this->background_image) : null,
            'extra_data' => $this->extra_data,
        ];
    }
}
