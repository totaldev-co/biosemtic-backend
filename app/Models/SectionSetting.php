<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Model;

class SectionSetting extends Model
{
    use HasContentCache;

    protected $fillable = [
        'section_key',
        'title',
        'subtitle',
    ];

    public const CACHE_KEY = 'content.section_settings';

    public function scopeForApi($query)
    {
        return $query;
    }

    public function toApiArray(): array
    {
        return [
            'section_key' => $this->section_key,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
        ];
    }
}
