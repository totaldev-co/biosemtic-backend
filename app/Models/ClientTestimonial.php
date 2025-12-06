<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Model;

class ClientTestimonial extends Model
{
    use HasContentCache;

    protected $fillable = [
        'name',
        'position',
        'description',
        'image',
        'twitter_url',
        'linkedin_url',
        'dribbble_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public const CACHE_KEY = 'content.client_testimonials';

    public function toApiArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'position' => $this->position,
            'description' => $this->description,
            'image' => $this->image_url,
            'social_links' => [
                'twitter_url' => $this->twitter_url,
                'linkedin_url' => $this->linkedin_url,
                'dribbble_url' => $this->dribbble_url,
            ],
        ];
    }

    public function getImageUrlAttribute(): ?string
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
