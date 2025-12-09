<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasContentCache;

    protected $table = 'contact_info';

    protected $fillable = [
        'email',
        'phone',
        'address',
        'schedule',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public const CACHE_KEY = 'content.contact_info';

    public function toApiArray(): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'schedule' => $this->schedule,
        ];
    }
}
