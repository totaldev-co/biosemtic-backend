<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabla para almacenar los títulos y subtítulos de cada sección del sitio.
     * Cada sección tiene UN solo registro.
     */
    public function up(): void
    {
        Schema::create('section_settings', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique(); // news, brands, clients, services
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('section_settings');
    }
};
