<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('slug', 120)->nullable()->unique();
            $table->text('description')->nullable();
            $table->string('website_url')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('order')->nullable(); // optionnel
            $table->timestamps();

            // Index utiles (optionnels)
            $table->index('is_published');
            $table->index('order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('technologies');
    }
};
