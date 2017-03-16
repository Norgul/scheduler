<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'equipment_id',
        'reserved_from',
        'reserved_to',
    ];

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function equipment(){
        return $this->hasOne('App\Equipment', 'id');
    }
}
