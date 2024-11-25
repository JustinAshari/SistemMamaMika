<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembeli');
            $table->foreignId('product_id');
            $table->text('alamat');
            $table->integer('jumlah');
            $table->decimal('total', 10, 2);
            $table->enum('status', ['pending', 'selesai'])->default('pending');
            $table->enum('payment', ['COD', 'QRIS']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
