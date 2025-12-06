<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Model;

class MissionVisionSection extends Model
{
    use HasContentCache;

    protected $fillable = [
        'background_image',
        'mission_title',
        'mission_text',
        'vision_title',
        'vision_text',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public const CACHE_KEY = 'content.mission_vision_section';

    public function toApiArray(): array
    {
        return [
            'id' => $this->id,
            'background_image' => $this->background_image_url,
            'mission' => [
                'title' => $this->mission_title,
                'text' => $this->mission_text,
            ],
            'vision' => [
                'title' => $this->vision_title,
                'text' => $this->vision_text,
            ],
        ];
    }

    public function getBackgroundImageUrlAttribute(): ?string
    {
        if (!$this->background_image) {
            return null;
        }

        if (str_starts_with($this->background_image, 'http')) {
            return $this->background_image;
        }

        return asset('storage/' . $this->background_image);
    }
}
