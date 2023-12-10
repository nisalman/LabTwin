<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relate extends Model
{
    use HasFactory;

    public function instruments()
    {
        return $this->belongsToMany(Instrument::class, 'instrument_properties');
    }
}
