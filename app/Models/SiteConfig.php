<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteConfig extends Model
{
    protected $fillable = [
        'logo_header',
        'logo_footer',
        'footer_description',
        'footer_services_title',
        'footer_contact_title',
        'copyright_text',
        'whatsapp_url',
        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'youtube_url',
        'whatsapp_icon',
        'facebook_icon',
        'instagram_icon',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public const CACHE_KEY = 'site_config';
    public const CACHE_TTL = 3600;

    /**
     * Obtener la configuración activa cacheada
     */
    public static function getCached(): ?array
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            $config = self::where('is_active', true)->first();

            if (!$config) {
                return null;
            }

            return [
                'logo_header' => $config->logo_header ? asset('storage/' . $config->logo_header) : null,
                'logo_footer' => $config->logo_footer ? asset('storage/' . $config->logo_footer) : null,
                'footer_description' => $config->footer_description,
                'footer_services_title' => $config->footer_services_title,
                'footer_contact_title' => $config->footer_contact_title,
                'copyright_text' => $config->copyright_text,
                'social_links' => [
                    'whatsapp' => [
                        'url' => $config->whatsapp_url,
                        'icon' => $config->whatsapp_icon ? asset('storage/' . $config->whatsapp_icon) : null,
                    ],
                    'facebook' => [
                        'url' => $config->facebook_url,
                        'icon' => $config->facebook_icon ? asset('storage/' . $config->facebook_icon) : null,
                    ],
                    'instagram' => [
                        'url' => $config->instagram_url,
                        'icon' => $config->instagram_icon ? asset('storage/' . $config->instagram_icon) : null,
                    ],
                    'linkedin' => [
                        'url' => $config->linkedin_url,
                        'icon' => null,
                    ],
                    'youtube' => [
                        'url' => $config->youtube_url,
                        'icon' => null,
                    ],
                ],
            ];
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
