<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasContentCache;

    protected $fillable = [
        'title',
        'description',
        'image',
        'top_left_text',
        'top_right_text',
        'link_text',
        'link_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public const CACHE_KEY = 'content.news';

    public function toApiArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image_url,
            'top_left_text' => $this->top_left_text,
            'top_right_text' => $this->top_right_text,
            'link_text' => $this->link_text,
            'link_url' => $this->link_url,
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
