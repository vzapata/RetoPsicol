<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    use HasFactory;

    protected $table = "boletas";

    public function evento()
    {
        return $this->belongsTo('App\Models\Evento');
    }
}
