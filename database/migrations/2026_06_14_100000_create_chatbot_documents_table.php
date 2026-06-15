<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chatbot_documents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('content');
            $table->string('source')->default('manual');
            $table->string('url')->nullable();
            $table->integer('weight')->default(1);
            $table->timestamps();

            $table->index('source');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chatbot_documents');
    }
};
