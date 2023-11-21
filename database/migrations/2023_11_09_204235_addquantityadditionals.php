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
        Schema::table('additionals', function (Blueprint $table) {
            $table->integer('quantity')->nullable()->default('1')->after('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('additionals', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }
};
