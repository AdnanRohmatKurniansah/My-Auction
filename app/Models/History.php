<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function masyarakat() {
        return $this->belongsTo(Masyarakat::class);
    }

    public function lelang() {
        return $this->belongsTo(Lelang::class);
    }

    public function barang() {
        return $this->hasOne(Barang::class);
    }
}
