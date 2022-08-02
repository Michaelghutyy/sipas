<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tujuan',
        'batasWaktu',
        'isiRingkasan',
        'sifat',
        'catatan',
    ];

    public function suratmasuk() {
        return $this->hasMany(SuratMasuk::class);
    }
}
