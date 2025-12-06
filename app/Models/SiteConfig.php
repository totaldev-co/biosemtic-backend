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

    public const CACHE_KEY = 'content.site_config';
    public const CACHE_TTL = 3600;

    public static function getCached(): ?array
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            $config = self::where('is_active', true)->first();

            if (!$config) {
                return null;
            }

            return $config->toApiArray();
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

    public function toApiArray(): array
    {
        return [
            'logo_header' => $this->getAssetUrl($this->logo_header),
            'logo_footer' => $this->getAssetUrl($this->logo_footer),
            'footer_description' => $this->footer_description,
            'footer_services_title' => $this->footer_services_title,
            'footer_contact_title' => $this->footer_contact_title,
            'copyright_text' => $this->copyright_text,
            'social_links' => [
                'whatsapp' => [
                    'url' => $this->whatsapp_url,
                    'icon' => $this->getAssetUrl($this->whatsapp_icon),
                ],
                'facebook' => [
                    'url' => $this->facebook_url,
                    'icon' => $this->getAssetUrl($this->facebook_icon),
                ],
                'instagram' => [
                    'url' => $this->instagram_url,
                    'icon' => $this->getAssetUrl($this->instagram_icon),
                ],
                'linkedin' => [
                    'url' => $this->linkedin_url,
                    'icon' => null,
                ],
                'youtube' => [
                    'url' => $this->youtube_url,
                    'icon' => null,
                ],
            ],
        ];
    }

    private function getAssetUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        if (str_starts_with($path, 'http')) {
            return $path;
        }

        return asset('storage/' . $path);
    }
}
