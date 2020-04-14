<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{

    // creamos las relaciones de la entidad Model

    public function client()   {
        return $this->belongsTo('App\client', 'client_id');

    }
    public function contact()   {
        return $this->belongsTo('App\contact', 'contact_id');

    }
    public function payment_type()   {
        return $this->belongsTo('App\payment_type');

    }
    public function order_prices()   {
        return $this->hasMany('App\order_price');
    }

    public function calculations()   {
        return $this->hasMany('App\calculation','order_id');
    }
    public function work_type()   {
        return $this->belongsTo('App\work_type', 'work_type_id');

    }
    public function work_subtype()   {
        return $this->belongsTo('App\work_subtype', 'work_subtype_id');

    }
    public function user()   {
        return $this->belongsTo('App\user', 'user_id');

    }
    public function states()   {
        return $this->belongsTo('App\states', 'order_id');

    }
    public function work_details()   {
        return $this->hasMany('App\work_detail', 'order_id');

    }
    public function order_designs()   {
        return $this->hasMany('App\order_design', 'order_id');
    }
    // Query scope

    public function scopeNumero($query, $numero)
    {
        if($numero)
            return $query->where('numero', 'LIKE', "%$numero%");
    }

    public function scopeTipo($query, $tipo)
    {
        if($tipo)
            return $query->where('tipo', 'LIKE', "%$tipo%");
    }
    public function scopeDescripcion($query, $descripcion)
    {
        if($descripcion)
            return $query->where('descripcion', 'LIKE', "%$descripcion%");
    }
    public function scopeWork_type_descripcion($query, $work_type_descripcion)
    {
        if($work_type_descripcion)
            return $query->where('work_type_descripcion', 'LIKE', "%$work_type_descripcion%");
    }

    public function scopeWork_subtype_descripcion($query, $work_subtype_descripcion)
    {
        if($work_subtype_descripcion)
            return $query->where('work_subtype_descripcion', 'LIKE', "%$work_subtype_descripcion%");
    }
    public function scopeRazon_social($query, $razon_social)
    {
        if($razon_social)
            return $query->where('razon_social', 'LIKE', "%$razon_social%");
    }
    public function scopeNombre_fantasia($query, $nombre_fantasia)
    {
        if($nombre_fantasia)
            return $query->where('razon_social', 'LIKE', "%$nombre_fantasia%");
    }
}
