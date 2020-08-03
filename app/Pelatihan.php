<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $table = 'pelatihans';

    protected $fillable = [
        'nama', 'harga', 'tipe', 'trainer', 'kode_unik_voucher', 'kategori_materi', 'level_kesulitan', 'pengalaman_kerja_peserta', 'kemampuan_dasar_peserta', 'kemampuan_teknis_peserta', 'deskripsi', 'alat_training', 'bahan_materi', 'publish', 'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
