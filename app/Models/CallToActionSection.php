<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Model;

class CallToActionSection extends Model
{
    use HasContentCache;

    protected $fillable = [
        'title',
        'description',
        'primary_button_text',
        'primary_button_url',
        'secondary_button_text',
        'secondary_button_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public const CACHE_KEY = 'content.call_to_action_section';

    public function toApiArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'primary_button' => [
                'text' => $this->primary_button_text,
                'url' => $this->primary_button_url,
            ],
            'secondary_button' => [
                'text' => $this->secondary_button_text,
                'url' => $this->secondary_button_url,
            ],
        ];
    }
}
