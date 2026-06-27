<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('primary_keyword')->nullable()->after('meta_keywords');
            $table->string('secondary_keywords')->nullable()->after('primary_keyword');
            $table->string('canonical_url')->nullable()->after('secondary_keywords');
            $table->json('faqs')->nullable()->after('canonical_url');
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['primary_keyword', 'secondary_keywords', 'canonical_url', 'faqs']);
        });
    }
};
