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
        Schema::create('blinds', function (Blueprint $table) {
            $table->id();
            $table->string('description')->default('blinde');
            $table->string('name');
            $table->integer('points');
            $table->unsignedBigInteger('user_id');
            $table->boolean('delivery')->default('0');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blinds');
    }
};
