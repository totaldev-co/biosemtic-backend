<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Información de contacto editable (sección izquierda del formulario)
        Schema::create('contact_info', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('¿Tienes dudas? Contáctanos');
            $table->text('subtitle')->default('Atendemos tu solicitud, brindamos asesoría especializada');
            $table->string('email')->default('ventas@biosimtec.com.co');
            $table->string('phone')->default('+57 318 5277390');
            $table->string('address')->default('Cra. 80c #25f-34');
            $table->text('schedule')->default("Lunes - Jueves: 7:00am - 5:00pm\nViernes: 7:00am - 4:00pm");
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_info');
    }
};
