<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasContentCache;

    protected $table = 'contact_info';

    protected $fillable = [
        'title',
        'subtitle',
        'email',
        'phone',
        'address',
        'schedule',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static string $cacheKey = 'contact_info_content';

    public function scopeForApi($query)
    {
        return $query->where('is_active', true);
    }

    public function toApiArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'schedule' => $this->schedule,
        ];
    }
}
