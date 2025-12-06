<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mission_vision_sections', function (Blueprint $table) {
            $table->id();
            $table->string('background_image')->nullable();
            $table->string('mission_title')->default('Nuestra misión');
            $table->text('mission_text');
            $table->string('vision_title')->default('Nuestra visión');
            $table->text('vision_text');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mission_vision_sections');
    }
};
