<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{
    public function home()
    {
        //return response('Contenido',200,["X-TOKEN" => "Secret"]);
        //return response('Contenido',200)->header('X-TOKEN','secret');
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
        
        $datos = $request->all(); //Devolvemos los datos que nos llegan del formulario en JSON
        //return redirect('/'); //Redirecciona a una URL especifica
        //return redirect()->route('saludos'); //Redirecciona a un alias de algun URL
        return back()
                    ->with('keyMensaje',"Mensaje a mandar a la vista"); //Regresa a la ruta anterior

        //return response()->json(["data" => $datos],200)
         //                   ->header('X-TOKEN', 'secret');
    }
}
