<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $table = 'pelatihans';

    protected $fillable = [
        'nama', 'harga', 'tipe', 'trainer', 'kode_unik_voucher', 'kategori', 'level', 'pengalaman_kerja_peserta', 'kemampuan_dasar_peserta', 'kemampuan_teknis_peserta', 'deskripsi', 'alat_training', 'bahan_materi', 'publish', 'gambar'
    ];
}
