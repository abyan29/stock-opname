<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes;

    protected $table = 'pegawai';

    protected $fillable = ['nama', 'nip', 'bagian_id'];

    public function bagian()
    {
        return $this->belongsTo(Bagian::class, 'bagian_id');
    }
}
