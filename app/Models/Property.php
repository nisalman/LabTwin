<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';

    public function instruments()
    {
        return $this->belongsToMany(Instrument::class, 'instrument_properties');
    }
}
