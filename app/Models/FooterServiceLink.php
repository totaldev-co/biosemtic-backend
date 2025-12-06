<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Model;

class FooterServiceLink extends Model
{
    use HasContentCache;

    protected $fillable = [
        'label',
        'url',
        'badge',
        'order',
        'is_active',
    ];

    protected $casts = [
        'order' => 'integer',
        'is_active' => 'boolean',
    ];

    public const CACHE_KEY = 'content.footer_service_links';

    public function toApiArray(): array
    {
        return [
            'label' => $this->label,
            'url' => $this->url,
            'badge' => $this->badge,
        ];
    }
}
