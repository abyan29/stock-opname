<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';

    protected $fillable = [
        'bagian_id',
        'deskripsi',
    ];

    public function bagian()
    {
        return $this->belongsTo(Bagian::class);
    }
}
