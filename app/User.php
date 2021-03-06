<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'research_group',
        'cell_number',
        'active',
        'role_id',
        'equipment_id',
        'highlight_color'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function equipment(){
        return $this->belongsToMany('App\Equipment');
    }

    public function supervisor(){
        return $this->belongsToMany('App\User', 'supervisors', 'user_id', 'supervisor_id');
    }

    public function isAdmin()
    {
        return ($this->role->name == 'Administrator') ?  true : false;
    }
    public function isStudent()
    {
        return ($this->role->name == 'Student') ?  true : false;
    }
}
