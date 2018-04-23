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
    return view('saludo',compact('nombre'));

}])->where('nombre',"[A-Za-z]+");

Route::get('contactos',['as' => 'contactos', function(){
    return view('contactos');
}]);