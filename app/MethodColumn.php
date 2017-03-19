<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MethodColumn extends Model
{
    protected $fillable = [
        'name'
    ];

    public function methods()
    {
        return $this->belongsToMany('App\EquipmentMethod');
    }
}
