<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    public function pelatihans()
    {
        return $this->belongsTo(Pelatihan::class);
    }
}
