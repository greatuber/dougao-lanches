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
        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('product_id')->onDelete('cascade');
            $table->foreignId('additional_id')->nullable()->onDelete('cascade');
            $table->foreignId('user_id')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->double('price');
            $table->integer('quanty')->nullable()->default('1');
            $table->string('observation')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
