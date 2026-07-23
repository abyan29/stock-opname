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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('nama');
            $table->foreignId('barang_jenis_id')->constrained('barang_jenis');
            $table->foreignId('satuan_id_besar')->constrained('satuan');
            $table->foreignId('satuan_id_kecil')->constrained('satuan');
            $table->integer('stok_minimal')->default(0);
            $table->integer('stok_maksimal')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
