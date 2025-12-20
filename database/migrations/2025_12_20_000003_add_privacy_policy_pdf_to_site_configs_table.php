<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_configs', function (Blueprint $table) {
            $table->string('privacy_policy_pdf')->nullable()->after('instagram_icon');
        });
    }

    public function down(): void
    {
        Schema::table('site_configs', function (Blueprint $table) {
            $table->dropColumn('privacy_policy_pdf');
        });
    }
};
