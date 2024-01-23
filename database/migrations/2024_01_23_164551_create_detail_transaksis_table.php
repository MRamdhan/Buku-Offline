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
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('buku_id')->constrained();
            $table->foreignId('transaksi_id')->nullable()->constrained()->onDelete('cascade');
            $table->integer('qty');
            $table->integer('input_pembayaran')->default(0);
            $table->string('id_pelanggan');
            $table->enum('status',['keranjang','cekout']);
            $table->integer('totalharga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksis');
    }
};
