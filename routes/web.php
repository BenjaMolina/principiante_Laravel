<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as' => 'home', function () {
    return view('home');
}]);

Route::get('saludos/{nombre?}', ['as' => 'saludos',function ($nombre = "Por defecto") {
    // return view('saludo',[
    //     'nombre' => $nombre
    // ]);
    // return view('saludo')->with([
    //     'nombre' => $nombre
    // ]);
    $html = "<h1>HOLA MUNDO</h1>";
    $consolas = [
        'Playstation',
        'Xbox One',
        'Nintendo 64'
    ];

    return view('saludo',compact('nombre','html','consolas'));

}])->where('nombre',"[A-Za-z]+");

Route::get('contactos',['as' => 'contactos', function(){
    return view('contactos');
}]);