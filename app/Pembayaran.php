<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    public function pesertas()
    {
        return $this->belongsToMany(Peserta::class);
    }

    public function pelatihans()
    {
        return $this->belongsToMany(Pelatihan::class);
    }

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class);
    }

    public function webinars()
    {
        return $this->belongsToMany(Webinar::class);
    }
}
