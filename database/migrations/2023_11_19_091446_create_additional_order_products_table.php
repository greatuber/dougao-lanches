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
        Schema::create('additional_order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('additional_id')->nullable();
            $table->unsignedInteger('order_product_id')->nullable();
            $table->unsignedBigInteger('order_list_id')->nullable();
           
            $table->timestamps();

            $table->foreign('additional_id')->references('id')->on('additionals')->onDelete('cascade');
            $table->foreign('order_product_id')->references('id')->on('order_products')->onDelete('cascade');
            $table->foreign('order_list_id')->references('id')->on('order_lists')->onDelete('cascade');
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_order_products');
    }
};
