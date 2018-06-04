<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class MessagesController extends Controller
{
    public function index()
    {

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
}
