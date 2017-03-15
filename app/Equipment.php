<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = [
        'name'
    ];

    public function reservations(){
        return $this->hasMany('App\Reservation');
    }

    /*public function users(){
        return $this->belongsToMany('App\User');
    }*/
}
