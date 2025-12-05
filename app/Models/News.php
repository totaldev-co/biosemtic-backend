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
    ];

    protected static string $cacheKey = 'news_content';

    public function scopeForApi($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    public function toApiArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'top_left_text' => $this->top_left_text,
            'top_right_text' => $this->top_right_text,
            'link_text' => $this->link_text,
            'link_url' => $this->link_url,
        ];
    }
}
