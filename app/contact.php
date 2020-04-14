<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
  
    // creamos las relaciones de la entidad Model

    public function client()   {
        return $this->belongsTo('App\client');

    }
}
