<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "messages"; //Asignarle una tabla diferente al nombre que tiene el modelo
    protected $fillable = ['nombre','email','mensaje']; //Asignar que campos puede insertar


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function note(){
        return $this->morphOne(Note::class, 'notable');
    }


}
