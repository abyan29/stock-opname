<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterStock extends Model
{
    use SoftDeletes;

    protected $table = 'master_stock';

    protected $fillable = [
        'bagian_id',
        'barang_id',
        'supplier_id',
        'produsen_id',
        'jumlah_satuan_kecil',
        'satuan_id_kecil',
        'batch',
        'kadaluwarsa',
        'harga_beli',
        'harga_jual',
    ];

    public function bagian()
    {
        return $this->belongsTo(Bagian::class, 'bagian_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function produsen()
    {
        return $this->belongsTo(Produsen::class, 'produsen_id');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id_kecil');
    }
}
