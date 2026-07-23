<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use SoftDeletes;

    protected $table = 'barang';

    protected $fillable = ['nama', 'barang_jenis_id', 'satuan_id_besar', 'satuan_id_kecil', 'stok_minimal', 'stok_maksimal'];

    public function barang_jenis()
    {
        return $this->belongsTo(BarangJenis::class, 'barang_jenis_id');
    }

    public function satuan_besar()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id_besar');
    }

    public function satuan_kecil()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id_kecil');
    }
}
