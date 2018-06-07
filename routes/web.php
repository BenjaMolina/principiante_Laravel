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

//Usando controladores
//Route::get('/', 'PagesController@home')->name('home')->middleware('example'); //Middleware

Route::get('contactame',[
    'as' => 'contactactamee', 
    'uses'=>'PagesController@contact'
    ]); //Otra forma de darle un Alias a un Controlador

Route::get('/', 'PagesController@home')->name('home');

Route::get('contactos', 'PagesController@contactos')->name('contactos');

Route::post('contacto', 'PagesController@mensaje');

Route::get('saludos/{nombre?}', 'PagesController@saludos') //parametro opcional
                                ->name('saludos')
                                ->where('nombre', "[A-Za-z]+");


//USO de REST
/*Route::get('mensajes','MessagesController@index')->name('messages.index');
Route::get('mensajes/create','MessagesController@create')->name('messages.create');
Route::post('mensajes','MessagesController@store')->name('messages.store');
Route::get('mensajes/{id}','MessagesController@show')->name('messages.show');
Route::get('mensajes/{id}/edit','MessagesController@edit')->name('messages.edit');
Route::put('mensajes/{id}','MessagesController@update')->name('messages.update');
Route::delete('mensajes/{id}','MessagesController@destroy')->name('messages.destroy');*/



//Reduciendo las rutas a una sola linea
Route::resource('mensajes','MessagesController');
