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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('pro_email');
            $table->text('pro_description');
            $table->text('pro_note');
            $table->string('pro_bamer');
            $table->decimal('pro_price', 10, 2);
            $table->decimal('pro_discount', 10, 2);
            $table->decimal('pro_discount_percent', 10, 2);
            $table->decimal('pro_installment', 10, 2);
            $table->string('pro_size');
            $table->string('pro_image');
            $table->string('pro_second_image');
            $table->string('pro_material');
            $table->string('pro_shape');
            $table->decimal('pro_weight', 8, 3);
            $table->decimal('pro_frame_width', 5, 2);
            $table->decimal('pro_lens_width', 5, 2);
            $table->decimal('pro_lens_height', 5, 2);
            $table->decimal('pro_bridge', 5, 2);
            $table->decimal('pro_temple', 5, 2);
            $table->string('pro_frame_notes');
            $table->text('pro_rx_range');
            $table->string('pro_pd_range');
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
        Schema::dropIfExists('products');
    }
};
