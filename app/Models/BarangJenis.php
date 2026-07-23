<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangJenis extends Model
{
    use SoftDeletes;

    protected $table = 'barang_jenis';

    protected $fillable = ['nama', 'kategori'];
}
