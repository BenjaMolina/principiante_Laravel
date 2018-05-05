<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function contactos()
    {
        return view('contactos');
    }

    public function saludos($nombre = "Por Defecto")
    {
        $html = "<h1>HOLA MUNDO</h1>";
        $consolas = [
            'Playstation',
            'Xbox One',
            'Nintendo 64'
        ];

        return view('saludo',compact('nombre','html','consolas'));
    }

    public function mensaje(CreateMessageRequest $request) //Recibimos los datos en el $request
    {
        
        return $request->all(); //Devolvemos los datos que nos llegan del formulario en JSON
        
    }
}
