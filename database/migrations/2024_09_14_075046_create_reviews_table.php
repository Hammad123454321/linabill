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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pro_id');
            $table->bigInteger('cus_id');
            $table->string('pro_sku');
            $table->string('review_title');
            $table->string('review_details');
            $table->string('quantity');
            $table->string('style');
            $table->string('fit');
            $table->enum('status', [1, 0])->default(1);
            $table->enum('is_deleted', [1, 0])->default(0);
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
