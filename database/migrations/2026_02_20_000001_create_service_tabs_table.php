<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_tabs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('tab_name');
            $table->string('title');
            $table->text('description');
            $table->json('features')->nullable();
            $table->text('footer_text')->nullable();
            $table->string('image')->nullable();
            $table->string('bottom_image')->nullable();
            $table->boolean('has_button')->default(false);
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_tabs');
    }
};
