<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_configs', function (Blueprint $table) {
            $table->id();

            $table->string('logo_header')->nullable();
            $table->string('logo_footer')->nullable();

            $table->string('footer_description')->nullable();
            $table->string('footer_services_title')->default('Servicios');
            $table->string('footer_contact_title')->default('Contacto');
            $table->string('copyright_text')->nullable();

            $table->string('whatsapp_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();

            $table->string('whatsapp_icon')->nullable();
            $table->string('facebook_icon')->nullable();
            $table->string('instagram_icon')->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('navigation_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('label');
            $table->string('path');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('footer_service_links', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('url');
            $table->string('badge')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_service_links');
        Schema::dropIfExists('navigation_items');
        Schema::dropIfExists('site_configs');
    }
};
