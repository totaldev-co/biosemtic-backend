<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Model;

class NavigationItem extends Model
{
    use HasContentCache;

    protected $fillable = [
        'name',
        'label',
        'path',
        'order',
        'is_active',
    ];

    protected $casts = [
        'order' => 'integer',
        'is_active' => 'boolean',
    ];

    public const CACHE_KEY = 'content.navigation_items';

    public function toApiArray(): array
    {
        return [
            'name' => $this->name,
            'label' => $this->label,
            'path' => $this->path,
        ];
    }
}
