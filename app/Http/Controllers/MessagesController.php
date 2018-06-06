<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class MessagesController extends Controller
{
    public function index()
    {
        $messages =  DB::table('messages')->get();

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
        DB::table('messages')->insert([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        //Redireccionar
        return redirect()->route('messages.index');
    }

    public function show($id)
    {
        $message = DB::table('messages')->where('id',$id)->first();

        return view(
            'messages.show',
            compact('message')
        );
    }

    public function edit($id)
    {
        $message = DB::table('messages')->where('id',$id)->first();

        return view(
            'messages.edit',
            compact('message')
        );
    }

    public function update(Request $request, $id)
    {
        //Actualizamos
        DB::table('messages')->where('id',$id)->update([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "updated_at" => Carbon::now(),
        ]);
        
        //Redireccionamos
        return redirect()->route('messages.index');
    }

    public function destroy($id)
    {
        //Eliminadr mensaje
        DB::table('messages')->where('id',$id)->delete();

        //Redireccionar
        return redirect()->route('messages.index');
    }
}
