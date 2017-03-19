<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentMethod extends Model
{
    protected $fillable = [
        'name',
        'cost',
    ];

    public function columns()
    {
        return $this->belongsToMany('App\MethodColumn');
    }

    public function equipment()
    {
        return $this->belongsToMany('App\Equipment');
    }

}
