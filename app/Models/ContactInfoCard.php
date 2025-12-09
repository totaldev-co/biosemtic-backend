<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Model;

class ContactInfoCard extends Model
{
    use HasContentCache;

    protected $fillable = [
        'icon',
        'title',
        'text',
        'detail',
        'order',
        'is_active',
    ];

    protected $casts = [
        'text' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public const CACHE_KEY = 'content.contact_info_cards';

    public function toApiArray(): array
    {
        return [
            'id' => $this->id,
            'icon' => $this->getIconUrl(),
            'title' => $this->title,
            'text' => $this->text,
            'detail' => $this->detail,
        ];
    }

    public function getIconUrl(): ?string
    {
        if (!$this->icon) {
            return null;
        }

        if (str_starts_with($this->icon, 'http')) {
            return $this->icon;
        }

        return asset('storage/' . $this->icon);
    }
}
