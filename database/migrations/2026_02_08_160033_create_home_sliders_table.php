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
        Schema::create('home_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title_uz');
            $table->string('title_en');
            $table->string('subtitle_uz')->nullable();
            $table->string('subtitle_en')->nullable();
            $table->text('description_uz')->nullable();
            $table->text('description_en')->nullable();
            $table->string('image', 500);
            $table->string('image_mobile', 500)->nullable();
            $table->string('button_text_uz', 100)->nullable();
            $table->string('button_text_en', 100)->nullable();
            $table->string('button_url', 500)->nullable();
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
        Schema::dropIfExists('home_sliders');
    }
};
