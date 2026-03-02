<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentalProductImage extends Model
{
    protected $fillable = [
        'rental_product_id',
        'image_path',
        'alt_text',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public function rentalProduct(): BelongsTo
    {
        return $this->belongsTo(RentalProduct::class);
    }

    public function getImageUrlAttribute(): string
    {
        if (!$this->image_path) {
            return url('images/rental-products/default.png');
        }

        if (str_starts_with($this->image_path, 'http')) {
            return $this->image_path;
        }

        return url('storage/' . $this->image_path);
    }
}
