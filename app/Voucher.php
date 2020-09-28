<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        'kode', 'pelatihan_id'
    ];

    public function pelatihans()
    {
        return $this->belongsTo(Pelatihan::class);
    }

    public function pembayarans()
    {
        return $this->belongsToMany(Pembayaran::class);
    }
}
