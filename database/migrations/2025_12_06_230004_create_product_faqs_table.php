<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Preguntas frecuentes para productos (se muestran en ProductDetail)
        Schema::create('product_faqs', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable(); // Icono de la pregunta
            $table->string('title'); // Pregunta
            $table->text('text'); // Respuesta
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_faqs');
    }
};
