<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Message;
use App\User;

use Mail;
use App\Events\MessageWasReceived;

class MessagesController extends Controller
{

    function __construct()
    {
        $this->middleware('auth',['except' =>['create','store']]); //Middleware para evitar acceder a rutas mediante la URL
    }


    public function index()
    {
        //$messages =  DB::table('messages')->get(); //Query Builder
         
        $messages = Message::with('user','note','tags')->get(); //Eloquent

        return view(
            'messages.index',  //Retornamos la vista que se encuentra en views/messages/index.blade.php
            compact('messages') //Retornamos la variable $messages
        );
    }

    public function create()
    {
        return view('messages.create'); //Retornamos la vista que se encuentra en views/messages/create.blade.php
    }

    public function store(Request $request)
    {
        //Guradar el mensaje 
        /*DB::table('messages')->insert([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);*/  //Query Builder


        //Primera forma de insertar un nuevo registro
        /*$message = new Message;
        $message->nombre = $request->input('nombre');
        $message->email = $request->input('email');
        $message->mensaje = $request->input('mensaje');
 
        $message->save();*/

        //Segunda Forma de insertar nuevo registro
        
        //Tercera forma de insertar un nuevo registro
        /*Message::create([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje')
            ]);*/

        $message = new Message;
        $message->nombre = $request->input('nombre') ? $request->input('nombre') : '';
        $message->email = $request->input('email') ? $request->input('email') : '';
        $message->mensaje = $request->input('mensaje');

        
        $message->save();
 
        if(auth()->check())
        {
            auth()->user()->messages()->save($message);
        }
        
        event(new MessageWasReceived($message));
        /*auth()->user()->messages()->create($request->all()); //Solo funciona si lo hacen usuarios autenticados

        
        $message = new Message;
        $message->nombre = '';
        $message->email = '';
        $message->mensaje = $request->input('mensaje');

        $message->user_id = auth()->user()->id;

        $message->save();*/


        //Redireccionar
        return redirect()->route('mensajes.create')->with('keyMensaje', 'Hemos recibido tu mensaje');
    }

    public function show($id)
    {
        //$message = DB::table('messages')->where('id',$id)->first(); //Query Builder

        $message = Message::findOrFail($id); //Eloquent

        return view(
            'messages.show',
            compact('message')
        );
    }

    public function edit($id)
    {
        //$message = DB::table('messages')->where('id',$id)->first(); //Query Builder

        $message = Message::findOrFail($id); //Eloquent
        
        return view(
            'messages.edit',
            compact('message')
        );
    }

    public function update(Request $request, $id)
    {
        //Actualizamos
        /*DB::table('messages')->where('id',$id)->update([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "updated_at" => Carbon::now(),
        ]);*/ //Query Builder
        

        /*$message = Message::findOrFail($id); //Buscamos el registro
        $message->update($request->all()); //Editamos el registro encontrado anteriormente
        */

        //En una sola linea
        Message::findOrFail($id)->update($request->all());

        //Redireccionamos
        return redirect()->route('mensajes.index');
    }

    public function destroy($id)
    {
        //Eliminadr mensaje
        //DB::table('messages')->where('id',$id)->delete(); //Query Builder

        Message::findOrFail($id)->delete(); //Eloquent

        //Redireccionar
        return redirect()->route('mensajes.index');
    }
}
