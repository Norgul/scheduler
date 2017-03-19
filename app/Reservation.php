<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'equipment_id',
        'reserved_from',
        'reserved_to',
        'number_of_samples',
        'cancelled',
        'completed',
        'method_id',
        'cancellation_reason'
    ];

    protected $attributes = [
        'cancelled' => false,
        'completed' => false
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function equipment()
    {
        return $this->hasOne('App\Equipment', 'id', 'equipment_id');
    }

    public function user_list()
    {
        return $this->belongsToMany('App\User');
    }

    public function method()
    {
        return $this->hasOne('App\EquipmentMethod', 'id', 'method_id');
    }
}
