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
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'assigned_roles'); //Obtiene todos los roles asociados al usuario
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


    public function hasRoles(array $roles)
    {
        //dd($this->roles); //Manda a llamar al metodo role()

        return $this->roles->pluck('nombre')->intersect($roles)->count();
        
        /*foreach ($roles as $role) 
        {
            
            foreach ($this->roles as $userRole) //
            {
                if ($userRole->nombre === $role){
    
                    return true;
                }
                
            }
        }
        return false;*/
    }

    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }


}
