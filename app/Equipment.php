<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $attributes = [
        'name' => ''
    ];

    public function reservations(){
        return $this->hasMany('App\Reservation');
    }

    public function equipment_methods(){
        return $this->belongsToMany('App\EquipmentMethod');
    }
}
