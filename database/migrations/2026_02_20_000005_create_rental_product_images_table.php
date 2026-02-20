<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rental_product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_product_id')
                ->constrained('rental_products')
                ->onDelete('cascade');
            $table->string('image_path');
            $table->string('alt_text')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rental_product_images');
    }
};
