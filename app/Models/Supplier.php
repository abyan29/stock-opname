<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $table = 'supplier';

    protected $fillable = ['nama', 'pic', 'alamat', 'email', 'telepon', 'pks_aktif', 'tanggal_mulai_pks', 'tanggal_akhir_pks'];
}
