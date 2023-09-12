<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    use HasFactory;
    protected $guarded = ['id'];
    public function level() {
        return $this->belongsTo(Level::class);
    }

    public function lelang() {
        return $this->hasOne(Lelang::class);
    }
}
