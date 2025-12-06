<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasContentCache;

    protected $fillable = [
        'name',
        'logo',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public const CACHE_KEY = 'content.brands';

    public function toApiArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'logo' => $this->logo_url,
        ];
    }

    public function getLogoUrlAttribute(): ?string
    {
        if (!$this->logo) {
            return null;
        }

        if (str_starts_with($this->logo, 'http')) {
            return $this->logo;
        }

        return asset('storage/' . $this->logo);
    }
}
