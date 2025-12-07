<?php

namespace App\Models;

use App\Models\Traits\HasContentCache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasContentCache;

    protected $fillable = [
        'category_id',
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

    public const CACHE_KEY = 'content.products';

    /**
     * Boot del modelo para generar slug automáticamente
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name') && !$product->isDirty('slug')) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    /**
     * Categoría del producto
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    /**
     * Imágenes del producto
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('order');
    }

    /**
     * Scope para API - solo productos activos con categorías activas
     */
    public function scopeForApi(Builder $query): Builder
    {
        return $query->where('is_active', true)
            ->whereHas('category', function ($q) {
                $q->where('is_active', true);
            })
            ->with(['category', 'images'])
            ->orderBy('order')
            ->orderBy('name');
    }

    /**
     * Scope para filtrar por categoría (slug)
     */
    public function scopeByCategory(Builder $query, string $categorySlug): Builder
    {
        return $query->whereHas('category', function ($q) use ($categorySlug) {
            $q->where('slug', $categorySlug);
        });
    }

    /**
     * Imagen por defecto para productos sin imágenes
     */
    public const DEFAULT_IMAGE_PATH = 'products/image.png';

    /**
     * Formato para listado de API
     */
    public function toApiArray(): array
    {
        $images = $this->images->map(fn($img) => $img->image_url)->toArray();

        // Si no hay imágenes, usar la imagen por defecto
        if (empty($images)) {
            $images = [asset('storage/' . self::DEFAULT_IMAGE_PATH)];
        }

        return [
            'id' => (string) $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'category' => $this->category ? $this->category->slug : null,
            'category_name' => $this->category ? $this->category->name : null,
            'images' => $images,
        ];
    }

    /**
     * Formato para detalle de API
     */
    public function toDetailApiArray(): array
    {
        $images = $this->images->map(fn($img) => [
            'id' => $img->id,
            'url' => $img->image_url,
            'alt' => $img->alt_text,
        ])->toArray();

        // Si no hay imágenes, usar la imagen por defecto
        if (empty($images)) {
            $images = [
                [
                    'id' => 0,
                    'url' => asset('storage/' . self::DEFAULT_IMAGE_PATH),
                    'alt' => $this->name,
                ],
            ];
        }

        return [
            'id' => (string) $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'category' => $this->category ? $this->category->toApiArray() : null,
            'images' => $images,
        ];
    }
}
