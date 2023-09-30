<!-- <?php

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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('product_id')->onDelete('cascade');
            $table->foreignId('user_id')->onDelete('cascade');
            $table->enum('status',['processando','aceito','em produção','saiu para emtrega'])->dafault('processando');
            $table->enum('retirada',['Lanchonete','entregar'])->default('entregar');
            $table->double('fee')->default('6');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
