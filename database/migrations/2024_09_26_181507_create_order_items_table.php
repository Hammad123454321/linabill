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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cus_id');
            $table->bigInteger('pro_id');
            $table->bigInteger('pro_sku');
            $table->decimal('pro_price', 10, 2);
            $table->decimal('frame_price', 10, 2)->nullable();
            $table->decimal('coating_price', 10, 2)->nullable();
            $table->integer('qty');
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
