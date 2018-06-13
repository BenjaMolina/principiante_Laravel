<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles"; //Asignarle una tabla diferente al nombre que tiene el modelo

    protected $fillable = ['nombre','display_name','description']; //Asignar que campos puede insertar

    public function user()
    {
        //return $this->hasOne(User::class);
        return $this->hasMany(User::class);
    }
}
