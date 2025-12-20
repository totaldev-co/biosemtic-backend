<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('who_we_are_stats');
    }

    public function down(): void
    {
        Schema::create('who_we_are_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('who_we_are_section_id')->constrained()->cascadeOnDelete();
            $table->string('value');
            $table->string('label');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
};
