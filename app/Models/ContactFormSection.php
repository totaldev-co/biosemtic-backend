<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ContactFormSection extends Model
{
    use HasContentCache;

    protected $fillable = [
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public const CACHE_KEY = 'content.contact_form_section';

    /**
     * Override para retornar solo el primer registro activo
     */
    public static function getCached(): ?array
    {
        return cache()->remember(
            self::getCacheKey(),
            self::getCacheTtl(),
            function () {
                $section = self::where('is_active', true)->first();

                if (!$section) {
                    return null;
                }

                return $section->toApiArray();
            }
        );
    }

    public function toApiArray(): array
    {
        return [
            'id' => $this->id,
            'image' => $this->getImageUrl(),
        ];
    }

    public function getImageUrl(): ?string
    {
        if (!$this->image) {
            return null;
        }

        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        return asset('storage/' . $this->image);
    }
}
