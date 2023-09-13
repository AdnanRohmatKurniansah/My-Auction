<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function lelang() {
        return $this->hasOne(Lelang::class);
    }

    public function history() {
        return $this->belongsTo(History::class);
    }
}
