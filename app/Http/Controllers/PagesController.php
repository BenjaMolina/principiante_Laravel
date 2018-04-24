<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function mensaje(Request $request) //Recibimos los datos en el $request
    {
        //return $request->all(); //Devolvemos los datos que nos llegan del formulario en JSON
        
        if($request->has('nombre')) //Verificamos si el campo nombre si vien desde el formulario
        {
            return "Tiene nombre.. y es ". $request->input('nombre');
        }

        return "No tiene nombre";
        
    }
}
