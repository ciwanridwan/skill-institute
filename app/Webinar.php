<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    protected $table = 'webinars';
    
    protected $fillable = [
        'judul', 'harga', 'tipe', 'trainer', 'deskripsi', 'alat_webinar', 'publish', 'jadwal', 'link', 'kuota_pendaftaran', 'gambar'
    ];

    public function payments()
    {
        return $this->belongsToMany(Pembayaran::class);
    }
}
