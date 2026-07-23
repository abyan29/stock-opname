<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bagian extends Model
{
    use SoftDeletes;

    protected $table = 'bagian';

    protected $fillable = ['nama', 'referensi_id'];

    public function referensi()
    {
        return $this->belongsTo(Bagian::class, 'referensi_id');
    }

    public function children()
    {
        return $this->hasMany(Bagian::class, 'referensi_id');
    }
}
