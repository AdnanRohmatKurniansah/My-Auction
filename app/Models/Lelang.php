<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function petugas() {
        return $this->belongsTo(Petugas::class);
    }

    public function masyarakat() {
        return $this->belongsTo(Masyarakat::class);
    }

    public function barang() {
        return $this->belongsTo(Barang::class);
    }
}
