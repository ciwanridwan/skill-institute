<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Popular extends Model
{
    public function pelatihans()
    {
        return $this->belongsToMany(Pelatihan::class);
    }
}
