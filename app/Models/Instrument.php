<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsToMany(Property::class, 'instrument_properties');
    }
    public function relate()
    {
        return $this->belongsToMany(Relate::class, 'instrument_relates');
    }
}
