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
        Schema::create('headers', function (Blueprint $table) {
            $table->id();
            $table->string('top_bar_image');
            $table->string('logo');
            $table->string('heading_text');
            $table->string('banner1_title');
            $table->string('banner1_desc');
            $table->string('banner1_link');
            $table->string('banner1_image');
            $table->string('banner2_image');
            $table->string('banner2_left');
            $table->string('banner2_right');
            $table->string('video_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headers');
    }
};
