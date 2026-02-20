<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class RentalProductCategory extends Model
{
    use HasContentCache;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public const CACHE_KEY = 'content.rental_product_categories';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('name') && !$category->isDirty('slug')) {
                $category->slug = Str::slug($category->name);
            }

            if ($category->isDirty('is_active') && !$category->is_active) {
                $category->rentalProducts()->update(['is_active' => false]);
            }
        });
    }

    public function rentalProducts(): HasMany
    {
        return $this->hasMany(RentalProduct::class, 'category_id');
    }

    public function scopeForApi(Builder $query): Builder
    {
        return $query->where('is_active', true)
            ->orderBy('order')
            ->orderBy('name');
    }

    public function toApiArray(): array
    {
        return [
            'id' => (string) $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
        ];
    }
}
