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
        Schema::create('master_stock', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('bagian_id')->constrained('bagian');
            $table->foreignId('barang_id')->constrained('barang');
            $table->foreignId('supplier_id')->constrained('supplier');
            $table->foreignId('produsen_id')->constrained('produsen');
            $table->integer('jumlah_satuan_kecil')->default(0);
            $table->foreignId('satuan_id_kecil')->constrained('satuan');
            $table->string('batch')->nullable();
            $table->date('kadaluwarsa')->nullable();
            $table->decimal('harga_beli', 15, 2)->default(0);
            $table->decimal('harga_jual', 15, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_stock');
    }
};
