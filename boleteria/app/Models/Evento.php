<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    public function ubicacion()
    {
        return $this->belongsTo('App\Models\Ubicacion');
    }

    public function boletas(){
        return $this->hasMany('App\Models\Boleta');
    }
}
