<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaPenerima',
        'kodesuratMasuk',
        'tglSuratDiterima',
        'tglsuratMasuk',
        'asalSurat',
        'perihal',
        'fileSurat',
        'disposisi_id',
    ];

    public function disposisi()
    {
        return $this->belongsTo(Disposisi::class);
    }
}
