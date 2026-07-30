<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    protected $fillable = [
        'bagian_id',
        'barang_id',
        'batch',
        'stok_sistem',
        'stok_fisik',
        'selisih',
    ];

    public function bagian()
    {
        return $this->belongsTo(Bagian::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
